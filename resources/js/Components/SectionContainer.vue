<script setup>
defineProps({
    as: { type: String, default: 'section' },
    wrapperClass: { type: String, default: '' },
});
</script>

<template>
    <component :is="as" :class="['mx-auto max-w-6xl px-4 py-16 md:px-6 lg:px-8', wrapperClass]">
        <slot />
    </component>
</template>
