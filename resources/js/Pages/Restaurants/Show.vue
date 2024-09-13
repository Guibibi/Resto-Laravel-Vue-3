<script setup>
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import RatingStar from '@/Components/RatingStar.vue';
import BackArrow from '@/Components/BackArrow.vue';

const props = defineProps({
  restaurant: {
    type: Object,
    required: true
  }
});

const imageUrl = ref('');

const fetchRandomImage = () => {
  imageUrl.value = 'https://picsum.photos/1000/600?random=' + Math.random();
};

onMounted(() => {
  fetchRandomImage();
});

const goBack = () => {
    router.visit(route('restaurants.index'))
};
</script>

<template>
  <div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="relative">
          <img 
            :src="imageUrl" 
            :alt="restaurant.name"
            class="w-full h-64 object-cover"
          />
          <button 
            @click="goBack" 
            class="absolute top-4 left-4 p-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition-colors duration-200"
          >
            <BackArrow size="24" color="#4B5563" />
          </button>
        </div>
        <div class="p-6">
          <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ restaurant.name }}</h1>
          <p class="text-gray-600 mb-4">{{ restaurant.description }}</p>
          <div class="mb-4">
            <div class="text-sm text-gray-600 mb-1">Rating:</div>
            <RatingStar :rating="restaurant.rating" />
          </div>
          <div class="bg-gray-100 p-4 rounded-lg">
            <h2 class="text-lg font-semibold mb-2 text-gray-800">Location</h2>
            <p class="text-gray-600">{{ restaurant.location }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>