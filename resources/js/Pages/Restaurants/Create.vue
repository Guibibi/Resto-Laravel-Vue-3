<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3';
import Button from '@/Components/Button.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    name: '',
    food_type: '',
    location: '',
    rating: '',
    description: ''
});

const submit = () => {
    console.log('hello^')
    form.post(route('restaurants.store'), {
        onSuccess: () => {
            router.visit(route('restaurants.index'));
        },
        onError: (error) => {
            console.error(error)
        }
    });
};
</script>

<template>
    <form @submit.prevent="submit" class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">Create New Restaurant</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <InputLabel for="restaurantName" value="Restaurant Name" />
                        <TextInput
                            id="restaurantName"
                            v-model="form.name"
                            type="text"
                            class="mt-1 block w-full"
                            required
                            autofocus
                        />
                        <InputError :message="form.errors.name" class="mt-2" />
                    </div>
                    
                    <div>
                        <InputLabel for="foodType" value="Food Type" />
                        <TextInput
                            id="foodType"
                            v-model="form.food_type"
                            type="text"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError :message="form.errors.food_type" class="mt-2" />
                    </div>
                    
                    <div>
                        <InputLabel for="location" value="Location" />
                        <TextInput
                            id="location"
                            v-model="form.location"
                            type="text"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError :message="form.errors.location" class="mt-2" />
                    </div>
                    
                    <div>
                        <InputLabel for="rating" value="Rating" />
                        <TextInput
                            id="rating"
                            v-model="form.rating"
                            type="number"
                            step="0.1"
                            min="0"
                            max="5"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError :message="form.errors.rating" class="mt-2" />
                    </div>
                    
                    <div class="md:col-span-2">
                        <InputLabel for="description" value="Description" />
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="4"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            required
                        ></textarea>
                        <InputError :message="form.errors.description" class="mt-2" />
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end">
                    <Button text="Create Restaurant" @click="submit" />
                </div>
            </div>
        </div>
    </form>
</template>