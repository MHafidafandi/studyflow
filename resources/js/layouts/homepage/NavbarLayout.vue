<script setup lang="ts">
import { GraduationCap } from '@lucide/vue';
import { onMounted, onUnmounted, ref } from 'vue';
import { dashboard, login, register } from '@/routes';
import { router } from '@inertiajs/vue3';

const navItems = [
    { label: 'Home', href: '#', id: 'home' },
    { label: 'Courses', href: '#courses', id: 'courses' },
    { label: 'Features', href: '#features', id: 'features' },
    { label: 'Pricing', href: '#pricing', id: 'pricing' },
];

const activeSection = ref('home');
let observer: IntersectionObserver | null = null;

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    activeSection.value = entry.target.id;
                }
            });
        },
        { rootMargin: '-40% 0px -55% 0px' }, // aktif saat section ada di ~tengah viewport
    );

    navItems.forEach((item) => {
        const el = document.getElementById(item.id);
        if (el) observer!.observe(el);
    });
});

onUnmounted(() => observer?.disconnect());
</script>

<template>
    <header
        class="sticky top-0 z-50 w-full border-b border-outline-variant bg-surface shadow-sm transition-all duration-200"
    >
        <div
            class="max-w-container-max-width mx-auto flex w-full items-center justify-between px-margin-mobile py-4 md:px-margin-desktop"
        >
            <div class="flex items-center gap-2">
                <span class="text-5xl text-primary"
                    ><GraduationCap fill="currentColor"
                /></span>
                <span
                    class="font-headline-md text-headline-md font-bold text-primary"
                    >SmartLearn</span
                >
            </div>
            <nav class="hidden items-center gap-8 md:flex">
                <a
                    v-for="item in navItems"
                    :key="item.id"
                    :href="item.href"
                    class="font-label-md pb-1 text-label-md transition-colors duration-200"
                    :class="
                        activeSection === item.id
                            ? 'border-b-2 border-primary font-bold text-primary'
                            : 'text-on-surface-variant hover:text-primary'
                    "
                    >{{ item.label }}</a
                >
            </nav>
            <div class="flex items-center gap-4">
                <button
                    class="font-label-md hidden rounded px-4 py-2 text-label-md text-primary transition-colors duration-200 hover:bg-surface-container hover:underline md:block"
                    @click="() => router.visit(login())"
                >
                    Log In
                </button>
                <button
                    class="font-label-md rounded bg-primary px-6 py-2.5 text-label-md text-primary-foreground shadow-sm transition-colors duration-200 hover:bg-primary-container hover:shadow-md"
                    @click="() => router.visit(register())"
                >
                    Get Started
                </button>
            </div>
        </div>
    </header>
</template>
