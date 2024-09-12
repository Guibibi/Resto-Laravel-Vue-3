<script setup lang="ts">
import { defineProps, defineEmits } from 'vue';

interface Props {
  text: string;
  type?: 'button' | 'submit' | 'reset';
  disabled?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  type: 'button',
  disabled: false,
});

const emit = defineEmits<{
  (e: 'click', event: MouseEvent): void;
}>();

const handleClick = (event: MouseEvent) => {
  emit('click', event);
};
</script>

<template>
  <button
    :type="type"
    :disabled="disabled"
    @click="handleClick"
    class="px-4 py-2 bg-gray-800 inline-flex items-center justify-center border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
  >
    {{ text }}
  </button>
</template>