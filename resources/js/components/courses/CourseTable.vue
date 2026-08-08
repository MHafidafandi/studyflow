<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import { Eye, ListFilter, Pencil, Search, Trash } from '@lucide/vue';
import { ref, watch } from 'vue';
import type { PaginatedCourses } from '@/types/course';

const props = defineProps<{
    courses: PaginatedCourses;
    filters: {
        search?: string;
        category?: string;
    };
}>();
const search = ref(props.filters.search || '');
const category = ref(props.filters.category || '');

const categories = ref([
    { id: 'all', name: 'All Categories' },
    { id: 'web-development', name: 'Web Development' },
    { id: 'data-science', name: 'Data Science' },
    { id: 'design', name: 'Design' },
    { id: 'marketing', name: 'Marketing' },
]);

let searchTimeout: ReturnType<typeof setTimeout>;

function applyFilters() {
    router.get('/courses', {
        search: search.value || undefined,
        category: category.value !== 'all' ? category.value : undefined,
    });
}

watch(search, () => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(applyFilters, 400);
});

watch(category, applyFilters);

function formatPrice(price: number): string {
    if (price === 0) {
        return 'Gratis';
    }

    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0,
    }).format(price);
}
</script>

<template>
    <div
        class="flex flex-col gap-3 overflow-hidden rounded-md border-outline-variant bg-surface-container-lowest shadow-sm"
    >
        <!-- Filter Bar -->
        <div
            class="flex w-full items-center justify-between border-outline-variant bg-surface-container-lowest px-6 py-4"
        >
            <div class="flex w-sidebar flex-col gap-2 md:w-100">
                <h1 class="text-headline-lg text-on-surface">Courses List</h1>
                <div
                    class="group relative flex items-center justify-start gap-2"
                >
                    <Search
                        class="absolute top-1 left-2.5 w-4 text-on-surface-variant group-focus-within:text-primary-container"
                    />
                    <input
                        v-model="search"
                        type="text"
                        placeholder="Search courses..."
                        class="w-full rounded-lg border bg-surface-container-lowest py-1 pl-8 text-body-md text-on-surface group-focus-within:border-primary-container group-focus-within:ring-1 group-focus-within:ring-primary-container"
                    />
                </div>
            </div>
            <button
                class="relative cursor-pointer rounded-xs border border-outline-variant bg-surface-container-lowest p-2 text-on-surface-variant shadow-sm transition-all duration-200 hover:bg-surface-container-high hover:text-on-surface"
            >
                <ListFilter class="cursor-pointer" />
                <select
                    v-model="category"
                    class="absolute top-4 left-0 w-full appearance-none bg-transparent pl-2 text-on-surface-variant focus:outline-none"
                >
                    <option
                        v-for="cat in categories"
                        :key="cat.id"
                        :value="cat.id"
                    >
                        {{ cat.name }}
                    </option>
                </select>
            </button>
        </div>

        <!-- Course List -->
        <div class="overflow-x-auto">
            <table
                class="w-full table-auto border-collapse border-spacing-0 text-sm"
            >
                <thead
                    class="bg-surface-container-highest tracking-wider uppercase"
                >
                    <tr
                        class="text-label-md font-semibold text-on-surface-variant"
                    >
                        <th
                            class="px-6 py-3 text-left font-semibold text-on-surface-variant"
                        >
                            Course Title
                        </th>
                        <th
                            class="px-6 py-3 text-left font-semibold text-on-surface-variant"
                        >
                            Category
                        </th>
                        <th
                            class="px-6 py-3 text-left font-semibold text-on-surface-variant"
                        >
                            Price
                        </th>
                        <th
                            class="hidden px-6 py-3 text-left font-semibold text-on-surface-variant md:table-cell"
                        >
                            Instructor
                        </th>
                        <th
                            class="px-6 py-3 text-left font-semibold text-on-surface-variant"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="course in props.courses.data"
                        :key="course.id"
                        class="border-b border-outline-variant p-2 hover:bg-surface-container-lowest"
                    >
                        <td class="py-4 pl-5">
                            <div class="flex items-center gap-2">
                                <img
                                    :src="course.thumbnail"
                                    alt="Course Thumbnail"
                                    class="h-8 w-8 rounded-md object-cover"
                                />
                                <span class="text-body-md text-on-surface">
                                    {{ course.title }}
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-body-md text-on-surface">
                            {{ course.category }}
                        </td>
                        <td class="px-6 py-4 text-body-md text-on-surface">
                            {{ formatPrice(course.price) }}
                        </td>
                        <td
                            class="hidden px-6 py-4 text-body-md text-on-surface md:table-cell"
                        >
                            {{ course.instructor_name }}
                        </td>
                        <td
                            class="flex items-center gap-2 px-6 py-4 text-right"
                        >
                            <button class="cursor-pointer text-green-400">
                                <Eye class="mr-1 inline h-4 w-4" />
                            </button>
                            <button class="ml-2 cursor-pointer text-primary">
                                <Pencil class="mr-1 inline h-4 w-4" />
                            </button>
                            <button class="ml-2 cursor-pointer text-red-600">
                                <Trash class="mr-1 inline h-4 w-4" />
                            </button>
                        </td>
                    </tr>
                </tbody>
                <tbody v-if="props.courses.total === 0">
                    <tr>
                        <td
                            colspan="5"
                            class="px-6 py-4 text-center text-body-md text-on-surface-variant"
                        >
                            No courses found.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div
            class="flex items-center justify-between bg-surface-container-lowest px-6 pt-2 pb-4"
        >
            <div class="text-body-md text-on-surface-variant">
                Showing {{ props.courses.from }} to {{ props.courses.to }} of
                {{ props.courses.total }} courses
            </div>

            <div class="flex items-center gap-2">
                <button
                    :disabled="!props.courses.prev_page_url"
                    @click="router.get(props.courses.prev_page_url)"
                    class="cursor-pointer rounded-sm border border-outline-variant bg-surface-container-lowest px-3 py-1 text-on-surface-variant disabled:cursor-not-allowed disabled:opacity-50"
                >
                    Previous
                </button>
                <div class="text-body-md text-on-surface-variant">
                    Page {{ props.courses.current_page }} of
                    {{ props.courses.last_page }}
                </div>
                <button
                    :disabled="!props.courses.next_page_url"
                    @click="router.get(props.courses.next_page_url)"
                    class="cursor-pointer rounded-sm border border-outline-variant bg-surface-container-lowest px-3 py-1 text-on-surface-variant disabled:cursor-not-allowed disabled:opacity-50"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>
