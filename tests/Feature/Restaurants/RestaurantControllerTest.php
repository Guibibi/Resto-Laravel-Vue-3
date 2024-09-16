<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class RestaurantControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index_displays_restaurants()
    {
        $restaurants = Restaurant::factory()->count(3)->create();

        $response = $this->get(route('restaurants.index'));

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $assert) => $assert
            ->component('Restaurants/Index')
            ->has('restaurants', 3)
        );
    }

    public function test_create_displays_form()
    {
        $response = $this->get(route('restaurants.create'));

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $assert) => $assert
            ->component('Restaurants/Create')
        );
    }

    public function test_store_creates_new_restaurant()
    {
        $restaurantData = [
            'name' => $this->faker->company,
            'food_type' => $this->faker->word,
            'location' => $this->faker->city,
            'rating' => $this->faker->randomFloat(1, 0, 5),
            'description' => $this->faker->paragraph,
        ];

        $response = $this->post(route('restaurants.store'), $restaurantData);

        $response->assertRedirect(route('restaurants.index'));
        $response->assertSessionHas('message', 'Restaurant Created Succesfully');
        $this->assertDatabaseHas('restaurants', $restaurantData);
    }

    public function test_show_displays_restaurant()
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurants.show', $restaurant));

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $assert) => $assert
            ->component('Restaurants/Show')
            ->has('restaurant', fn (Assert $assert) => $assert
                ->where('id', $restaurant->id)
                ->etc()
            )
        );
    }

    public function test_edit_displays_form()
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('restaurants.edit', $restaurant));

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $assert) => $assert
            ->component('Restaurants/Edit')
            ->has('restaurant', fn (Assert $assert) => $assert
                ->where('id', $restaurant->id)
                ->etc()
            )
        );
    }

    public function test_update_modifies_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $updatedData = [
            'name' => 'Updated Name',
            'food_type' => 'Updated Type',
            'location' => 'Updated Location',
            'rating' => 4.5,
            'description' => 'Updated description',
        ];

        $response = $this->put(route('restaurants.update', $restaurant), $updatedData);

        $response->assertRedirect(route('restaurants.index'));
        $response->assertSessionHas('message', 'Restaurant updated successfully.');
        $this->assertDatabaseHas('restaurants', $updatedData);
    }

    public function test_destroy_deletes_restaurant()
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->delete(route('restaurants.destroy', $restaurant));

        $response->assertRedirect(route('restaurants.index'));
        $response->assertSessionHas('message', 'Restaurant deleted successfully.');
        $this->assertDatabaseMissing('restaurants', ['id' => $restaurant->id]);
    }

    public function test_store_validates_input()
    {
        $response = $this->post(route('restaurants.store'), []);

        $response->assertSessionHasErrors(['name', 'food_type', 'location', 'description']);
    }

    public function test_update_validates_input()
    {
        $restaurant = Restaurant::factory()->create();

        $response = $this->put(route('restaurants.update', $restaurant), []);

        $response->assertSessionHasErrors(['name', 'food_type', 'location', 'description']);
    }
}