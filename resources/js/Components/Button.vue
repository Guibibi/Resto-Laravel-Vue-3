<script setup lang="ts">
const props = defineProps<{
    text: string
}>() 
</script>

<template>
<button class="px-4 py-2 bg-gray-800 inline-flex items-center border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mb-4">
                {{$props.text}}
            </button>
</template>