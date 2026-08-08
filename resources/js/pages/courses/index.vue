<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { BookOpenCheckIcon, Plus } from '@lucide/vue';
import CourseTable from '@/components/courses/CourseTable.vue';
import * as coursesRoutes from '@/routes/courses';
import type { PaginatedCourses } from '@/types/course';

const props = defineProps<{
    courses: PaginatedCourses;
    filters: {
        search?: string;
        category?: string;
    };
}>();
</script>

<template>
    <Head title="Katalog Kursus" />

    <div
        class="mx-auto flex w-full max-w-container flex-col gap-stack-lg p-margin-mobile md:p-margin-desktop"
    >
        <div
            class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center"
        >
            <div class="flex flex-col gap-2">
                <h1
                    class="mb-stack-lg text-headline-xl-mobile text-on-surface md:text-headline-xl"
                >
                    Courses Catalog
                </h1>
                <p
                    class="text-body-lg-mobile text-on-surface-variant md:text-body-lg"
                >
                    Find the best courses to enhance your skills and knowledge.
                </p>
            </div>
            <button
                class="flex items-center justify-center gap-2 rounded-sm bg-primary px-4 py-2 text-on-primary-container hover:bg-primary-container hover:text-on-primary-container focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:outline-none"
                @click="router.get(coursesRoutes.create())"
            >
                <Plus class="" />
                Create New Course
            </button>
        </div>

        <div class="grid grid-cols-1 gap-gutter md:grid-cols-3">
            <div
                class="flex w-full items-center justify-between rounded-md border border-outline-variant bg-surface-container-lowest p-6 shadow-sm hover:shadow-md"
            >
                <div>
                    <p class="mb-1 text-label-md text-on-surface-variant">
                        Total Courses
                    </p>
                    <p class="text-headline-lg text-on-surface">
                        {{ props.courses.data.length }}
                    </p>
                </div>
                <div
                    class="flex items-center justify-center rounded-full bg-surface-container-high p-2"
                >
                    <BookOpenCheckIcon class="h-8 w-8 text-primary" />
                </div>
            </div>
            <div
                class="flex w-full items-center justify-between rounded-md border border-outline-variant bg-surface-container-lowest p-6 shadow-sm hover:shadow-md"
            >
                <div>
                    <p class="mb-1 text-label-md text-on-surface-variant">
                        Total Courses
                    </p>
                    <p class="text-headline-lg text-on-surface">
                        {{ props.courses.data.length }}
                    </p>
                </div>
                <div
                    class="flex items-center justify-center rounded-full bg-surface-container-high p-2"
                >
                    <BookOpenCheckIcon class="h-8 w-8 text-primary" />
                </div>
            </div>
            <div
                class="flex w-full items-center justify-between rounded-md border border-outline-variant bg-surface-container-lowest p-6 shadow-sm hover:shadow-md"
            >
                <div>
                    <p class="mb-1 text-label-md text-on-surface-variant">
                        Total Courses
                    </p>
                    <p class="text-headline-lg text-on-surface">
                        {{ props.courses.data.length }}
                    </p>
                </div>
                <div
                    class="flex items-center justify-center rounded-full bg-surface-container-high p-2"
                >
                    <BookOpenCheckIcon class="h-8 w-8 text-primary" />
                </div>
            </div>
        </div>
        <CourseTable :courses="props.courses" :filters="props.filters" />
    </div>
</template>
