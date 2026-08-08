<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import { CloudUpload, Info } from '@lucide/vue';
import { reactive, ref, useTemplateRef } from 'vue';
import InputError from '@/components/InputError.vue';
import { store } from '@/routes/courses';

const refFileInput = useTemplateRef<HTMLInputElement | null>('refFileInput');
const thumbnailPreview = ref<string | null>(null);
const thumbnailFile = ref<File | null>(null);

const categories = ref([
    { id: 'all', name: 'All Categories' },
    { id: 'web-development', name: 'Web Development' },
    { id: 'data-science', name: 'Data Science' },
    { id: 'design', name: 'Design' },
    { id: 'marketing', name: 'Marketing' },
]);

function handleFileChange(event: Event) {
    const target = event.target as HTMLInputElement;
    const file = target.files?.[0];

    if (file) {
        const validTypes = ['image/png', 'image/jpeg', 'image/webp'];

        if (!validTypes.includes(file.type)) {
            alert('Please upload PNG, JPG, or WEBP image');
            resetThumbnail();

            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Image size must be less than 2MB');
            resetThumbnail();

            return;
        }

        thumbnailFile.value = file;

        const reader = new FileReader();
        reader.onload = (e) => {
            thumbnailPreview.value = e.target?.result as string;
        };
        reader.readAsDataURL(file);
    }
}

const resetThumbnail = () => {
    thumbnailPreview.value = null;
    thumbnailFile.value = null;

    if (refFileInput.value) {
        refFileInput.value.value = '';
    }
};

const triggerFileInput = () => {
    refFileInput.value?.click();
};

const removeThumbnail = () => {
    resetThumbnail();
};
</script>

<template>
    <Head title="Create Course" />

    <div class="w-full px-margin-desktop py-stack-lg">
        <section class="mb-stack-lg flex flex-col gap-2">
            <h2 class="text-headline-lg text-on-surface">
                Course Creation Workshop
            </h2>
            <p class="max-w-2xl text-body-lg text-on-surface-variant">
                Design an engaging learning experience. Fill in the details
                below to structure your curriculum and set your pricing.
            </p>
        </section>
        <Form
            v-bind="store.form()"
            :reset-on-success="true"
            v-slot="{ errors, processing }"
            class="w-full space-y-stack-lg pb-32"
        >
            <div
                class="card-shadow rounded-md border border-outline-variant bg-surface-container-lowest p-stack-md"
            >
                <div class="mb-6 flex items-center gap-3">
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-container/10 text-primary"
                    >
                        <span class="material-symbols-outlined" data-icon="info"
                            ><Info
                        /></span>
                    </div>
                    <h3 class="font-headline-md text-headline-md">
                        Course Basics
                    </h3>
                </div>
                <div class="grid grid-cols-1 gap-gutter md:grid-cols-12">
                    <div class="space-y-stack-md md:col-span-8">
                        <div class="space-y-1">
                            <label
                                class="font-label-md text-label-md text-on-surface-variant"
                                for="course_title"
                                >Course Title</label
                            >
                            <input
                                class="w-full rounded-md border border-outline-variant bg-surface-container-lowest p-3 text-body-md"
                                id="course_title"
                                name="course_title"
                                placeholder="e.g. Mastering Modern UI Design with Tailwind"
                                type="text"
                                required
                                autofocus
                                :tabindex="1"
                            />
                            <InputError :message="errors.course_title" />
                        </div>
                        <div class="grid grid-cols-1 gap-4 rounded-sm">
                            <div class="space-y-1">
                                <label
                                    class="font-label-md text-label-md text-on-surface-variant"
                                    for="category"
                                    >Category</label
                                >
                                <select
                                    class="form-input-focus border-outline-variantbg-surface-container-lowest w-full rounded-md border p-3 text-body-md"
                                    name="category"
                                    id="category"
                                    :tabindex="2"
                                    required
                                >
                                    <option
                                        :value="category.id"
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        {{ category.name }}
                                    </option>
                                </select>
                                <InputError :message="errors.category" />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label
                                class="font-label-md text-label-md text-on-surface-variant"
                                for="description"
                            >
                                Description</label
                            >
                            <textarea
                                class="form-input-focus w-full rounded-md border border-outline-variant bg-surface-container-lowest p-3 text-body-md"
                                placeholder="Briefly explain what students will learn in this course..."
                                rows="3"
                                id="description"
                                name="description"
                                required
                            ></textarea>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1 md:col-span-4">
                        <label
                            class="font-label-md text-label-md text-on-surface-variant"
                            for="course_thumbnail"
                            >Course Thumbnail</label
                        >
                        <div v-if="thumbnailPreview" class="relative">
                            <div
                                class="relative overflow-hidden rounded-xl border border-outline-variant"
                            >
                                <img
                                    :src="thumbnailPreview"
                                    alt="Thumbnail preview"
                                    class="h-auto w-full object-cover"
                                    style="max-height: 300px"
                                />

                                <!-- Overlay hover -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 transition-opacity hover:opacity-100"
                                >
                                    <button
                                        @click="triggerFileInput"
                                        class="mr-2 rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100"
                                    >
                                        Change
                                    </button>
                                    <button
                                        @click="removeThumbnail"
                                        class="rounded-lg bg-red-500 px-4 py-2 text-sm font-medium text-white hover:bg-red-600"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <p
                                class="mt-1 text-label-sm text-on-surface-variant"
                            >
                                {{ thumbnailFile?.name }}
                            </p>
                            <!-- Nama file -->
                        </div>
                        <div
                            v-else
                            class="group flex min-h-50 flex-1 cursor-pointer flex-col items-center justify-center rounded-xl border-2 border-dashed border-outline-variant bg-surface-container-low p-4 text-center transition-colors hover:bg-surface-container"
                            @click="triggerFileInput()"
                        >
                            <div
                                class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-surface-container-lowest shadow-sm transition-transform group-hover:scale-110"
                            >
                                <span
                                    class="material-symbols-outlined text-primary"
                                    data-icon="cloud_upload"
                                    ><CloudUpload
                                /></span>
                            </div>
                            <span
                                class="text-label-md font-bold text-on-surface"
                                >Click to upload</span
                            >
                            <span
                                class="mt-1 text-label-sm text-on-surface-variant"
                                >PNG or JPG (1280x720px)</span
                            >
                            <input
                                type="file"
                                accept="image/png,image/jpeg,image/webp"
                                id="course_thumbnail"
                                ref="refFileInput"
                                name="course_thumbnail"
                                class="hidden"
                                @change="handleFileChange"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section 2: Curriculum Builder -->
            <div
                class="card-shadow rounded-xl border border-outline-variant bg-surface-container-lowest p-stack-md"
            >
                <div class="mb-6 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-secondary-container/20 text-secondary"
                        >
                            <span
                                class="material-symbols-outlined"
                                data-icon="format_list_bulleted"
                                >format_list_bulleted</span
                            >
                        </div>
                        <h3 class="font-headline-md text-headline-md">
                            Curriculum Builder
                        </h3>
                    </div>
                    <button
                        class="flex items-center gap-2 rounded-lg px-3 py-1.5 text-label-md font-bold text-primary transition-colors hover:bg-primary/5"
                        type="button"
                    >
                        <span
                            class="material-symbols-outlined text-[18px]"
                            data-icon="add_circle"
                            >add_circle</span
                        >
                        Add Section
                    </button>
                </div>
                <div class="space-y-4">
                    <!-- Section Container -->
                    <div
                        class="overflow-hidden rounded-lg border border-outline-variant"
                    >
                        <div
                            class="flex items-center justify-between border-b border-outline-variant bg-surface-container-low px-4 py-3"
                        >
                            <div class="flex items-center gap-4">
                                <span
                                    class="material-symbols-outlined cursor-grab text-on-surface-variant"
                                    data-icon="drag_indicator"
                                    >drag_indicator</span
                                >
                                <span
                                    class="text-label-md font-bold text-on-surface-variant"
                                    >SECTION 1</span
                                >
                                <input
                                    class="w-64 border-none bg-transparent p-0 font-bold text-on-surface focus:ring-0"
                                    type="text"
                                    value="Introduction to UI Principles"
                                />
                            </div>
                            <div class="flex items-center gap-2">
                                <button
                                    class="hover:text-error p-1.5 text-on-surface-variant transition-colors"
                                >
                                    <span
                                        class="material-symbols-outlined text-[20px]"
                                        data-icon="delete"
                                        >delete</span
                                    >
                                </button>
                                <span
                                    class="material-symbols-outlined text-on-surface-variant"
                                    data-icon="expand_more"
                                    >expand_more</span
                                >
                            </div>
                        </div>
                        <!-- Lesson List -->
                        <div class="space-y-3 p-4">
                            <div
                                class="flex items-center gap-3 rounded-lg border border-outline-variant/50 bg-surface p-3"
                            >
                                <span
                                    class="material-symbols-outlined text-[20px] text-outline"
                                    data-icon="drag_handle"
                                    >drag_handle</span
                                >
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded bg-primary/10 text-primary"
                                >
                                    <span
                                        class="material-symbols-outlined text-[18px]"
                                        data-icon="play_circle"
                                        >play_circle</span
                                    >
                                </div>
                                <div class="flex-1">
                                    <input
                                        class="w-full border-none bg-transparent p-0 text-body-md focus:ring-0"
                                        type="text"
                                        value="Welcome to the Course"
                                    />
                                </div>
                                <div class="flex items-center gap-4">
                                    <select
                                        class="rounded-full border-none bg-surface-container px-3 py-1 text-label-sm focus:ring-1 focus:ring-primary"
                                    >
                                        <option>Video</option>
                                        <option>PDF</option>
                                        <option>Quiz</option>
                                    </select>
                                    <button class="text-on-surface-variant">
                                        <span
                                            class="material-symbols-outlined text-[18px]"
                                            data-icon="edit"
                                            >edit</span
                                        >
                                    </button>
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-3 rounded-lg border border-outline-variant/50 bg-surface p-3"
                            >
                                <span
                                    class="material-symbols-outlined text-[20px] text-outline"
                                    data-icon="drag_handle"
                                    >drag_handle</span
                                >
                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded bg-secondary/10 text-secondary"
                                >
                                    <span
                                        class="material-symbols-outlined text-[18px]"
                                        data-icon="description"
                                        >description</span
                                    >
                                </div>
                                <div class="flex-1">
                                    <input
                                        class="w-full border-none bg-transparent p-0 text-body-md focus:ring-0"
                                        type="text"
                                        value="UI Fundamentals Cheat Sheet"
                                    />
                                </div>
                                <div class="flex items-center gap-4">
                                    <select
                                        class="rounded-full border-none bg-surface-container px-3 py-1 text-label-sm focus:ring-1 focus:ring-primary"
                                    >
                                        <option>PDF</option>
                                        <option>Video</option>
                                        <option>Quiz</option>
                                    </select>
                                    <button class="text-on-surface-variant">
                                        <span
                                            class="material-symbols-outlined text-[18px]"
                                            data-icon="edit"
                                            >edit</span
                                        >
                                    </button>
                                </div>
                            </div>
                            <button
                                class="flex w-full items-center justify-center gap-2 rounded-lg border-2 border-dashed border-outline-variant py-2 text-label-md text-on-surface-variant transition-colors hover:bg-surface-container"
                                type="button"
                            >
                                <span
                                    class="material-symbols-outlined text-[18px]"
                                    data-icon="add"
                                    >add</span
                                >
                                Add Lesson
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section 3: Settings & Pricing -->
            <div class="grid grid-cols-1 gap-gutter md:grid-cols-2">
                <!-- Pricing & Level -->
                <div
                    class="card-shadow rounded-xl border border-outline-variant bg-surface-container-lowest p-stack-md"
                >
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-tertiary-container/20 text-tertiary"
                        >
                            <span
                                class="material-symbols-outlined"
                                data-icon="payments"
                                >payments</span
                            >
                        </div>
                        <h3 class="font-headline-md text-headline-md">
                            Pricing &amp; Level
                        </h3>
                    </div>
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <label
                                class="font-label-md text-label-md text-on-surface-variant"
                                >Course Price (Rp)</label
                            >
                            <div class="relative">
                                <span
                                    class="absolute top-1/2 left-4 -translate-y-1/2 font-bold text-on-surface-variant"
                                    >Rp</span
                                >
                                <input
                                    class="form-input-focus w-full rounded-lg border-outline-variant bg-surface-container-lowest py-3 pr-4 pl-12 text-body-md"
                                    placeholder="0"
                                    type="number"
                                />
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label
                                class="font-label-md text-label-md text-on-surface-variant"
                                >Difficulty Level</label
                            >
                            <div class="grid grid-cols-3 gap-2">
                                <label class="cursor-pointer">
                                    <input
                                        checked="true"
                                        class="peer hidden"
                                        name="level"
                                        type="radio"
                                    />
                                    <div
                                        class="rounded-lg border border-outline-variant p-3 text-center text-label-md transition-all peer-checked:border-primary peer-checked:bg-primary-container peer-checked:text-on-primary-container"
                                    >
                                        Beginner
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input
                                        class="peer hidden"
                                        name="level"
                                        type="radio"
                                    />
                                    <div
                                        class="rounded-lg border border-outline-variant p-3 text-center text-label-md transition-all peer-checked:border-primary peer-checked:bg-primary-container peer-checked:text-on-primary-container"
                                    >
                                        Intermediate
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input
                                        class="peer hidden"
                                        name="level"
                                        type="radio"
                                    />
                                    <div
                                        class="rounded-lg border border-outline-variant p-3 text-center text-label-md transition-all peer-checked:border-primary peer-checked:bg-primary-container peer-checked:text-on-primary-container"
                                    >
                                        Advanced
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Visibility & Meta -->
                <div
                    class="card-shadow flex flex-col rounded-xl border border-outline-variant bg-surface-container-lowest p-stack-md"
                >
                    <div class="mb-6 flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-surface-container-high text-on-surface-variant"
                        >
                            <span
                                class="material-symbols-outlined"
                                data-icon="visibility"
                                >visibility</span
                            >
                        </div>
                        <h3 class="font-headline-md text-headline-md">
                            Visibility
                        </h3>
                    </div>
                    <div class="flex-1 space-y-6">
                        <div
                            class="flex items-center justify-between rounded-xl border border-outline-variant bg-surface p-4"
                        >
                            <div>
                                <p class="font-bold text-on-surface">
                                    Public Visibility
                                </p>
                                <p
                                    class="text-label-sm text-on-surface-variant"
                                >
                                    Allow anyone to discover this course
                                </p>
                            </div>
                            <label
                                class="relative inline-flex cursor-pointer items-center"
                            >
                                <input
                                    checked="true"
                                    class="peer sr-only"
                                    type="checkbox"
                                />
                                <div
                                    class="peer h-6 w-11 rounded-full bg-outline-variant peer-checked:bg-primary peer-focus:outline-none after:absolute after:top-0.5 after:left-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:after:translate-x-full peer-checked:after:border-white"
                                ></div>
                            </label>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="font-label-md text-label-md text-on-surface-variant"
                                >Search Keywords</label
                            >
                            <div
                                class="flex min-h-11 flex-wrap gap-2 rounded-lg border border-outline-variant bg-surface-container-low p-3"
                            >
                                <span
                                    class="flex items-center gap-1 rounded-md bg-primary/10 px-2 py-1 text-label-sm text-primary"
                                    >UI Design
                                    <span
                                        class="material-symbols-outlined cursor-pointer text-[14px]"
                                        data-icon="close"
                                        >close</span
                                    ></span
                                >
                                <span
                                    class="flex items-center gap-1 rounded-md bg-primary/10 px-2 py-1 text-label-sm text-primary"
                                    >Tailwind
                                    <span
                                        class="material-symbols-outlined cursor-pointer text-[14px]"
                                        data-icon="close"
                                        >close</span
                                    ></span
                                >
                                <input
                                    class="min-w-25 flex-1 border-none bg-transparent p-0 text-label-sm focus:ring-0"
                                    placeholder="Add tag..."
                                    type="text"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Form>
    </div>
    <!-- Action Bar (Floating at Bottom) -->
    <div
        class="fixed right-0 bottom-0 left-0 z-50 border-t border-outline-variant bg-surface/90 px-margin-desktop py-4 backdrop-blur-xl md:left-sidebar"
    >
        <div class="mx-auto flex w-full max-w-250 items-center justify-between">
            <div class="hidden items-center gap-3 sm:flex">
                <span
                    class="material-symbols-outlined text-secondary"
                    data-icon="check_circle"
                    data-weight="fill"
                    >check_circle</span
                >
                <span class="text-label-md text-on-surface-variant"
                    >All changes saved to cloud</span
                >
            </div>
            <div class="flex w-full items-center gap-4 sm:w-auto">
                <button
                    class="font-label-md flex-1 rounded-full border border-outline-variant px-6 py-3 text-label-md text-on-surface-variant transition-all hover:bg-surface-container sm:flex-none"
                >
                    Save as Draft
                </button>
                <button
                    class="font-label-md text-on-primary flex-1 rounded-full bg-primary px-10 py-3 text-label-md shadow-lg shadow-primary/20 transition-all hover:scale-105 active:scale-95 sm:flex-none"
                >
                    Publish Course
                </button>
            </div>
        </div>
    </div>
</template>
