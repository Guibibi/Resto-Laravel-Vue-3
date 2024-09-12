<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

const page = usePage()
</script>

<template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6"
                >
                    <Link
                        :href="route('restaurants.create')"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mb-4"
                    >
                        Add New Restaurant
                    </Link>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Food Type
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Location
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Rating
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr
                                v-for="restaurant in page.props.restaurants"
                                :key="restaurant.id"
                            >
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ restaurant.name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ restaurant.food_type }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ restaurant.location }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ restaurant.rating }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                                >
                                    <Link
                                        :href="
                                            route(
                                                'restaurants.edit',
                                                restaurant.id,
                                            )
                                        "
                                        class="text-indigo-600 hover:text-indigo-900 mr-2"
                                        >Edit</Link
                                    >
                                    <Link
                                        :href="
                                            route(
                                                'restaurants.show',
                                                restaurant.id,
                                            )
                                        "
                                        class="text-green-600 hover:text-green-900"
                                        >View</Link
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>
