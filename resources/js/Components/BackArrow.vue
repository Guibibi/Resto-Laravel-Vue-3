<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  size: {
    type: String,
    default: '24'
  },
  color: {
    type: String,
    default: 'currentColor'
  }
});
</script>

<template>
  <svg 
    xmlns="http://www.w3.org/2000/svg" 
    :width="size" 
    :height="size" 
    viewBox="0 0 24 24" 
    :fill="color" 
    stroke="currentColor" 
    stroke-width="2" 
    stroke-linecap="round" 
    stroke-linejoin="round"
  >
    <line x1="19" y1="12" x2="5" y2="12"></line>
    <polyline points="12 19 5 12 12 5"></polyline>
  </svg>
</template>