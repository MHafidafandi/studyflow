<script setup lang="ts">
import FooterLayout from './homepage/FooterLayout.vue';
import NavbarLayout from './homepage/NavbarLayout.vue';
</script>

<template>
    <div
        class="text-on-background font-body-md flex min-h-screen flex-col bg-background text-body-md antialiased"
    >
        <NavbarLayout />
        <main class="flex-grow">
            <slot />
        </main>
        <FooterLayout />
    </div>
</template>
