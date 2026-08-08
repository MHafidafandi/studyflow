<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import {
    ArrowRight,
    ArrowRightToLine,
    Bitcoin,
    BookmarkPlus,
    Code,
    Handshake,
    MessagesSquare,
    MonitorPlay,
    School,
    ShieldCheck,
    Star,
    Wallpaper,
} from '@lucide/vue';
import type { course } from '@/types/course';

const courses: course[] = [
    {
        id: 1,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 2,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 3,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 4,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 5,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 6,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 7,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: false,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
    {
        id: 8,
        thumbnail:
            'https://lh3.googleusercontent.com/aida-public/AB6AXuCcv8L8cxXjKrCXZk-GovnLRcrVcI1d4UKJrFidU2HsZGvjvMfdAj1p4Dn3Mz8AGQP2u9kI-2hIu88yxrFN5J5a8cuYV1r6ooh2zX2JyNQtUpS3w8XQiqsjhetIVTTuqDwIEBoJXQd4A791UsppCTTPs15TDFR2ZIaOe_tbbJJ2lH0-kobgloaJdTloK_vcd0Mb6WrWYeDwb3QjmQxV3TUrhrvae011Ni5ubg1ATXlt7NMD0rIJz8rDj8VxGAeEyphHps36TqWblKTe',
        is_best_seller: true,
        star: '4.9',
        review: 2400,
        title: 'Advanced React Patterns & Architecture',
        author: 'Dr. Sarah Jenkins',
        price: '$89.99',
    },
];
</script>

<template>
    <Head title="Home Page" />
    <div class="mx-auto w-full">
        <section
            class="relative justify-center overflow-hidden bg-surface-container-lowest pt-20 pb-32"
        >
            <div
                class="max-w-container-max-width relative z-10 mx-auto grid grid-cols-1 items-center gap-gutter px-margin-mobile md:px-margin-desktop lg:grid-cols-2"
            >
                <div class="flex flex-col gap-stack-lg">
                    <div
                        class="inline-flex w-fit items-center gap-2 rounded-full border border-outline-variant bg-surface-container-high px-4 py-1.5"
                    >
                        <span
                            class="material-symbols-outlined text-sm text-primary"
                            ><Star class="text-label-sm"
                        /></span>
                        <span
                            class="font-label-sm text-label-sm text-on-surface"
                            >#1 LMS Platform 2026
                        </span>
                    </div>
                    <h1
                        class="font-headline-xl-mobile md:font-headline-xl text-headline-xl-mobile text-balance text-on-surface md:text-headline-xl"
                    >
                        Unlock Your Potential With
                        <span class="text-primary">StudyFlow</span>
                    </h1>
                    <p
                        class="font-body-lg max-w-xl text-body-lg text-on-surface-variant"
                    >
                        A modern, high-performance Learning Management System
                        designed to accelerate your growth. Expert instructors,
                        interactive content, and real-time collaboration.
                    </p>
                    <div class="flex flex-col gap-4 pt-4 lg:flex-row">
                        <button
                            class="font-label-md group flex items-center justify-center gap-2 rounded-sm bg-primary px-8 py-4 text-label-md text-primary-foreground shadow-sm transition-all duration-200 hover:bg-primary-container hover:shadow-md"
                        >
                            Explore Course
                            <span
                                class="material-symbols-outlined transition-transform group-hover:translate-x-1"
                                ><ArrowRightToLine
                            /></span>
                        </button>
                        <button
                            class="font-label-md group flex items-center justify-center gap-2 rounded-sm border border-outline px-8 py-4 text-label-md text-on-surface transition-all duration-200 hover:bg-surface-container"
                        >
                            <span class="material-symbols-outlined"
                                ><MonitorPlay />
                            </span>
                            Watch Demo
                        </button>
                    </div>
                    <div
                        class="mt-4 flex items-center gap-4 border-t border-outline-variant pt-4"
                    >
                        <div class="flex -space-x-3">
                            <img
                                class="h-10 w-10 rounded-full border-2 border-surface object-cover"
                                data-alt="A diverse group of modern, professional headshots of students and instructors, set in high-key, clean white lighting against a neutral background. The aesthetic is corporate and trustworthy, emphasizing a bright, optimistic light-mode style typical of high-end educational platforms. The subjects look confident and engaged."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIZOshNIrbt4bWRTs1XJhu-XO49GHONWwT3Vbgx-zh9Nhb8RZ4_sR1qm5zydueQvamoYERHn5nyhKcOtXaSwRpx_14LbGihM-3RzhkFa0vl9W1Z5RuhltZz6EPiiIksUjMkrmrwsv0vaKLqCoKCQh3ixxmSyXAWBRiHtlV_QWRN0Hldznxu6ucyBG5VO8HHbURNJz1aKbw7ejYvoIxQgWzJqW0AOWrVWCBSMq5I9qQ_tM1_E2rEuKbz0kFdZ2MZyZ3k7zkhe5eSXvj"
                            />
                            <img
                                class="h-10 w-10 rounded-full border-2 border-surface object-cover"
                                data-alt="A portrait of a confident young professional woman with a slight smile, illuminated by soft, modern studio lighting. The background is a clean, minimal off-white, reflecting a premium, corporate educational brand aesthetic. The overall mood is welcoming and intelligent."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQnimFDqO2lA9I69rkd3__AloMh8E-CNQ_9_jkyGo38_Xxc5tXD93fc54vW2_I9SeIrVtZiiEyAtLeguDPQ_mn9OtVdG0wt50CrJihp3q_0d-Fpt605jh85icxD0kBhvkcI7jKh29zIETthbE5J9DKztvqHszDSbGEwBDidlRMGbh4-LtUd3mAw4Mdw1wDvobJkMY0ZIz09datjR1f0RbHuF-elzj_EA21yR6KlKeUgOv99zLLGw3peWZ_RnAsAjfPFDnKqfvXcywm"
                            />
                            <img
                                class="h-10 w-10 rounded-full border-2 border-surface object-cover"
                                data-alt="A headshot of a thoughtful male instructor wearing glasses, brightly lit in a minimalist studio setting. The styling is contemporary and professional, aligning with a high-end, light-mode corporate design system. The background is subtle and bright."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuB26xvs2FeAx-muEdylilMuW--axdLIE3Gqs5PeEXE8ioKDF7SPSObblykW0eTBcYSybj82LLRJ-KbB3ROC-AY2sFH0bpNbcLtyGZGYxIXURlFtysUPNgxAETbECacavDHfknV7_P2MNoBIiQAe7zauXTTIyfw5VVTA0GHXUpEQeYLoWW_Jv16VCVQyTaMwsls_fhENZualp_dAOfY0lle1EkMyFkSQTQRixtTisC_0XPxCGsbhniHrk_haTsmDH9iVuC1X_07esbyK"
                            />
                        </div>
                        <div class="text-sm">
                            <p class="font-bold text-on-surface">
                                10k+ Learners
                            </p>
                            <p class="text-on-surface-variant">
                                Trusted worldwide
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative mt-12 lg:mt-0">
                    <div
                        class="absolute inset-0 -translate-x-10 translate-y-10 transform rounded-full bg-primary-container opacity-10 blur-3xl"
                    ></div>
                    <img
                        class="relative z-10 h-auto w-full rounded-xl border border-surface-container-high object-cover shadow-[0_20px_40px_-15px_rgba(0,0,0,0.1)]"
                        data-alt="A sleek, modern laptop open on a clean, minimalist wooden desk, displaying a sophisticated dashboard UI with charts and course progress. Sunlight streams in from an unseen window, creating a bright, optimistic light-mode atmosphere. Next to the laptop is a steaming cup of coffee and a neatly placed notebook. The overall tone is focused, professional, and aspirational, fitting a premium corporate LMS landing page."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAY2vZU98m8SJnAV9PG6Rzjrr4VftBDG0cI_PvjTLAc3x7h9GbTTePa-tK8MkycTrAu_Fm8UsjuVDvvFqNsY5b2LlWR4h6jlZFsf_Fy20ZyRmaxuqx6hYGHdX3pJaCmXZRY1QYvmW2BahIk0KMS11Lj24EK2GrPU_TzfjsjL9DLAOUNyLUGMoFNjga2_-lJbty2wZ5ldsmpIN1oRDFnbtZ1z5sGx1qTdDyZRJhAnHLBiTTx4ecNbWDUFbs_ewuckLhlRpUS0n5N9fco"
                        style="aspect-ratio: 4/3"
                    />
                    <!-- Floating Badge -->
                    <div
                        class="absolute -bottom-6 -left-6 z-20 flex hidden items-center gap-4 rounded-xl border border-outline-variant bg-surface p-4 shadow-lg md:flex"
                    >
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full bg-secondary-container"
                        >
                            <span
                                class="material-symbols-outlined text-on-secondary-container"
                                ><ShieldCheck
                            /></span>
                        </div>
                        <div>
                            <p class="font-bold text-on-surface">Certified</p>
                            <p
                                class="font-label-sm text-label-sm text-on-surface-variant"
                            >
                                Industry recognized
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-surface py-24" id="categories">
            <div
                class="max-w-container-max-width mx-auto px-margin-mobile md:px-margin-desktop"
            >
                <div class="mb-16 text-center">
                    <h2
                        class="font-headline-lg mb-4 text-headline-lg text-on-surface"
                    >
                        Explore Top Categories
                    </h2>
                    <p
                        class="font-body-lg mx-auto max-w-2xl text-body-lg text-on-surface-variant"
                    >
                        Discover specialized paths designed by industry experts
                        to elevate your career.
                    </p>
                </div>
                <div
                    class="grid auto-rows-[250px] grid-cols-1 gap-6 md:grid-cols-3"
                >
                    <!-- Category 1 (Large) -->
                    <a
                        class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all duration-300 hover:border-primary hover:shadow-md md:col-span-2"
                        href="#"
                    >
                        <div
                            class="absolute inset-0 z-10 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/80 to-transparent"
                        ></div>
                        <img
                            class="absolute inset-0 h-full w-full object-cover opacity-50 transition-transform duration-500 group-hover:scale-105"
                            data-alt="A modern, abstract digital illustration representing programming and software development. Soft, glowing code symbols hover in a clean, bright, minimalist 3D space with subtle blue and indigo tints. The aesthetic is high-tech but approachable, utilizing a light-mode corporate color palette."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCBRTzOmBAyD3N6fMWJjQUB3KUnCxp0cwhqUgeaBwhYa-DdS46sLQ-RU-3VppRRMLtyWozuI5M3CsqWnuhy8DOZ-YVPs-g_Z5ZODa-BaSQHvrx2M7yxFnTR5DHvzXMgm7E_7rfQNfD6vpvFoRg70iglaG2tKQfSXacFQz3d97yUOBL9VZk5BFpcPna0RTpVVJpYRP1gisVTNgHqZrE0my40pHzF75jzFZ-oBFhxXaMF4NNebb_LaFlB45_TV4wghSd0WPIEJzFvAIvJ"
                        />
                        <div
                            class="absolute inset-0 z-20 flex flex-col justify-end p-8"
                        >
                            <div
                                class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-primary text-primary-foreground shadow-sm"
                            >
                                <span class="material-symbols-outlined"
                                    ><Code
                                /></span>
                            </div>
                            <h3
                                class="font-headline-md mb-2 text-headline-md text-on-surface"
                            >
                                Programming &amp; Tech
                            </h3>
                            <p
                                class="flex items-center gap-2 text-on-surface-variant"
                            >
                                120+ Courses
                                <span
                                    class="material-symbols-outlined text-sm transition-transform group-hover:translate-x-1"
                                    ><ArrowRight
                                /></span>
                            </p>
                        </div>
                    </a>
                    <!-- Category 2 -->
                    <a
                        class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all duration-300 hover:border-primary hover:shadow-md"
                        href="#"
                    >
                        <div
                            class="absolute inset-0 z-10 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/80 to-transparent"
                        ></div>
                        <img
                            class="absolute inset-0 h-full w-full object-cover opacity-50 transition-transform duration-500 group-hover:scale-105"
                            data-alt="A bright, modern composition of business charts and financial graphs rendered in clean, soft 3D shapes. The lighting is high-key and professional, utilizing slate, white, and subtle teal tones to convey a trustworthy corporate business environment in a light-mode aesthetic."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdhRy4taNC_pjcfvBBPx6k7eQLr5jGBe-b1hsbMI9C-oPKjLet7wtMq6OWNEtSaRAHUvuwL5aLnweP2XdwHm8sZWYh3qeMBI5B2kN7G9bj6OB18HwazrybG64q2laxPPqbSTcrzW1u-tmL9F5LzJeKQ-BawRiTgF3rYax1MvektXg4DXsiOb_mNOpBzDhIgl76qK8WEW6NXHQXL3d-53f1BFDPAJuCJQFYZJDFU0PQItKtpCs7dERbAF3nsMlHupy4WGpF1oIjJoFz"
                        />
                        <div
                            class="absolute inset-0 z-20 flex flex-col justify-end p-8"
                        >
                            <div
                                class="text-on-secondary mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-secondary shadow-sm"
                            >
                                <span class="material-symbols-outlined"
                                    ><Handshake
                                /></span>
                            </div>
                            <h3
                                class="font-headline-md mb-2 text-headline-md text-on-surface"
                            >
                                Business
                            </h3>
                            <p
                                class="flex items-center gap-2 text-on-surface-variant"
                            >
                                85+ Courses
                            </p>
                        </div>
                    </a>
                    <!-- Category 3 -->
                    <a
                        class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all duration-300 hover:border-primary hover:shadow-md"
                        href="#"
                    >
                        <div
                            class="absolute inset-0 z-10 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/80 to-transparent"
                        ></div>
                        <img
                            class="absolute inset-0 h-full w-full object-cover opacity-50 transition-transform duration-500 group-hover:scale-105"
                            data-alt="A minimalist flatlay of design tools—a stylus, a tablet displaying wireframes, and color swatches—on a pristine white desk. The lighting is soft, natural, and bright, emphasizing creativity within a structured, clean corporate design system. The colors are muted and professional."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBgMulOzJbdCgRRZCYf-QUAEoxFoA-pTwqiwMcEjnyK6Qg12ZnrR3AyJXvjEmutO1bHrgBc_G0eZ_7XPTNTSunOmLv2ks_eGmxVWUgAtOXsZY5EYO26x_7LJfGkb2BgS0NIbmFHcsqKz7oL3xs1jzqNkA4oTVYF-0zOXBnRrSSQFBm5Ux3-mJ4ImkYaRJjotRm5bCmAmGe_zVqS3Ou9r2Xwij1Fh4wwa8RkYNxDadBEYzlYeHInwOmB5z-qhKpy2tMU_NCO4-dnATaz"
                        />
                        <div
                            class="absolute inset-0 z-20 flex flex-col justify-end p-8"
                        >
                            <div
                                class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-tertiary text-on-tertiary shadow-sm"
                            >
                                <span class="material-symbols-outlined"
                                    ><Wallpaper
                                /></span>
                            </div>
                            <h3
                                class="font-headline-md mb-2 text-headline-md text-on-surface"
                            >
                                Design UI/UX
                            </h3>
                            <p
                                class="flex items-center gap-2 text-on-surface-variant"
                            >
                                60+ Courses
                            </p>
                        </div>
                    </a>
                    <!-- Category 4 -->
                    <a
                        class="group relative overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest shadow-sm transition-all duration-300 hover:border-primary hover:shadow-md md:col-span-2"
                        href="#"
                    >
                        <div
                            class="absolute inset-0 z-10 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/80 to-transparent"
                        ></div>
                        <img
                            class="absolute inset-0 h-full w-full object-cover opacity-50 transition-transform duration-500 group-hover:scale-105"
                            data-alt="A dynamic, abstract digital representation of global marketing networks, featuring glowing nodes and connection lines over a bright, clean white background. The visual style is modern, corporate, and optimistic, using subtle indigo and amber highlights to suggest growth and strategy in a light-mode UI context."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6aunLZzpcGGjlXFWSXbBnhoEavOAjimcjOljee1vpAX71q4vtPIerP5LJUyE3E2XyuLow3lFdGhgpNo4jxbtWblPRd02-yXpM4XtP60w1hl5FWpozZuv1Ct7mRJILYNy__qrZBQO5LWE9MROd2tSyVfTMATPJBOkq8zS9sKrbKF17IKXOZVMRnP2QDLZQjhF-XX1q1oko--VqT9FIaeLPX_CgiQE_hIus-Sft5eGVem31Nf7hBF3emuswxkSvmDcnFegO96cOi3UZ"
                        />
                        <div
                            class="absolute inset-0 z-20 flex flex-col justify-end p-8"
                        >
                            <div
                                class="bg-error text-on-error mb-4 flex h-12 w-12 items-center justify-center rounded-lg shadow-sm"
                            >
                                <span class="material-symbols-outlined"
                                    ><Bitcoin
                                /></span>
                            </div>
                            <h3
                                class="font-headline-md mb-2 text-headline-md text-on-surface"
                            >
                                Digital Marketing
                            </h3>
                            <p
                                class="flex items-center gap-2 text-on-surface-variant"
                            >
                                95+ Courses
                                <span
                                    class="material-symbols-outlined text-sm transition-transform group-hover:translate-x-1"
                                    ><ArrowRight
                                /></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Why Choose Us -->
        <section
            class="border-y border-outline-variant bg-surface-container-low py-24"
            id="features"
        >
            <div
                class="max-w-container-max-width mx-auto px-margin-mobile md:px-margin-desktop"
            >
                <div class="flex flex-col items-center gap-16 md:flex-row">
                    <div class="md:w-1/2">
                        <h2
                            class="font-headline-lg mb-6 text-headline-lg text-on-surface"
                        >
                            Built for Serious Learners
                        </h2>
                        <p
                            class="font-body-lg mb-8 text-body-lg text-on-surface-variant"
                        >
                            We focus on outcomes. Our platform combines expert
                            instruction with interactive tools to ensure you
                            master the skills you need.
                        </p>
                        <div class="flex flex-col gap-6">
                            <div
                                class="flex gap-4 rounded-xl border border-transparent p-4 transition-colors duration-200 hover:border-outline-variant hover:bg-surface-container"
                            >
                                <div
                                    class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary-container text-on-primary-container"
                                >
                                    <span class="material-symbols-outlined"
                                        ><MessagesSquare
                                    /></span>
                                </div>
                                <div>
                                    <h4
                                        class="font-label-md mb-1 text-label-md font-bold text-on-surface"
                                    >
                                        Real-time Discussion
                                    </h4>
                                    <p
                                        class="font-body-md text-body-md text-on-surface-variant"
                                    >
                                        Engage with peers and instructors
                                        instantly in our integrated learning
                                        forums.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex gap-4 rounded-xl border border-transparent p-4 transition-colors duration-200 hover:border-outline-variant hover:bg-surface-container"
                            >
                                <div
                                    class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-secondary-container text-on-secondary-container"
                                >
                                    <span class="material-symbols-outlined"
                                        ><School
                                    /></span>
                                </div>
                                <div>
                                    <h4
                                        class="font-label-md mb-1 text-label-md font-bold text-on-surface"
                                    >
                                        Expert Instructors
                                    </h4>
                                    <p
                                        class="font-body-md text-body-md text-on-surface-variant"
                                    >
                                        Learn from industry veterans actively
                                        working in top tech companies.
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex gap-4 rounded-xl border border-transparent p-4 transition-colors duration-200 hover:border-outline-variant hover:bg-surface-container"
                            >
                                <div
                                    class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-tertiary-container text-on-tertiary-container"
                                >
                                    <span class="material-symbols-outlined"
                                        ><ShieldCheck
                                    /></span>
                                </div>
                                <div>
                                    <h4
                                        class="font-label-md mb-1 text-label-md font-bold text-on-surface"
                                    >
                                        Automated Certification
                                    </h4>
                                    <p
                                        class="font-body-md text-body-md text-on-surface-variant"
                                    >
                                        Earn verified, shareable certificates
                                        instantly upon course completion.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div
                            class="relative aspect-square w-full overflow-hidden rounded-2xl border border-outline-variant bg-surface shadow-[0_8px_30px_rgb(0,0,0,0.05)]"
                        >
                            <div
                                class="absolute inset-0 flex items-center justify-center"
                            >
                                <!-- Abstract animated background element could go here, or a highly polished UI mockup -->
                                <img
                                    class="h-full w-full object-cover"
                                    data-alt="A highly detailed, polished UI mockup of the SmartLearn dashboard displayed on a modern tablet screen. The interface is clean, utilizing a white background with indigo primary accents, showing a video player, a lively real-time chat sidebar, and course progress bars. The lighting is studio-quality, casting a soft shadow beneath the tablet to emphasize depth and a premium feel."
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhFV8GAgLPYWs3LvB03XZ9E-_eTRNaM_OO71bLUBJ6bT-X_qatoOp4zOFFx84nQ0pEuEsiDKky9gNLWUlh2B3NJeVZkOFUahdMSEU3fSeGqtVDkW9eT20w47wSe1521SI6meWdnnTx2N4Hz72ksmaU6yltNDvKyu5N8p2v7NZcdfstwCJYaZpIG5HKP7B_FibTMntcTcXGcZsaCVjkKWdREdF6-BeITVl_kuLOi1mji62zZlphFv7qENnBicgqsWczXTUAI1hgDw7_"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Courses Grid -->
        <section class="bg-surface py-24" id="courses">
            <div
                class="max-w-container-max-width mx-auto px-margin-mobile md:px-margin-desktop"
            >
                <div class="mb-12 flex items-end justify-between">
                    <div>
                        <h2
                            class="font-headline-lg mb-2 text-headline-lg text-on-surface"
                        >
                            Popular Courses
                        </h2>
                        <p
                            class="font-body-lg text-body-lg text-on-surface-variant"
                        >
                            Join thousands of students learning these top
                            skills.
                        </p>
                    </div>
                    <a
                        class="font-label-md hidden items-center gap-1 text-label-md font-bold text-primary hover:underline sm:flex"
                        href="#"
                    >
                        View All
                        <span class="material-symbols-outlined text-sm"
                            ><ArrowRight
                        /></span>
                    </a>
                </div>
                <div
                    class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4"
                >
                    <!-- Course Card 1 -->
                    <div
                        v-for="course in courses"
                        :key="course.id"
                        class="group flex cursor-pointer flex-col overflow-hidden rounded-xl border border-outline-variant bg-surface-container-lowest transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)]"
                    >
                        <div
                            class="relative h-40 overflow-hidden bg-surface-container"
                        >
                            <img
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                :data-alt="course.title"
                                :src="course.thumbnail"
                            />
                            <div
                                v-if="course.is_best_seller"
                                class="font-label-sm absolute top-3 right-3 rounded border border-outline-variant bg-surface/90 px-2 py-1 text-label-sm font-bold backdrop-blur-sm"
                            >
                                Best Seller
                            </div>
                        </div>
                        <div class="flex flex-grow flex-col p-5">
                            <div
                                class="mb-2 flex items-center gap-1 text-secondary"
                            >
                                <span
                                    class="material-symbols-outlined text-sm"
                                    style="font-variation-settings: 'FILL' 1"
                                    >star</span
                                >
                                <span
                                    class="font-label-sm text-label-sm font-bold"
                                    >{{ course.star }}</span
                                >
                                <span
                                    class="font-label-sm text-label-sm font-normal text-on-surface-variant"
                                    >({{ course.review }} reviews)</span
                                >
                            </div>
                            <h3
                                class="font-label-md mb-1 line-clamp-2 text-label-md font-bold text-on-surface transition-colors group-hover:text-primary"
                            >
                                {{ course.title }}
                            </h3>
                            <p
                                class="font-label-sm mb-4 flex-grow text-label-sm text-on-surface-variant"
                            >
                                {{ course.author }}
                            </p>
                            <div
                                class="flex items-center justify-between border-t border-outline-variant pt-4"
                            >
                                <span
                                    class="text-headline-sm font-headline-sm font-bold text-on-surface"
                                    >{{ course.price }}</span
                                >
                                <span
                                    class="material-symbols-outlined text-outline transition-colors group-hover:text-primary"
                                    ><BookmarkPlus
                                /></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex justify-center sm:hidden">
                    <button
                        class="font-label-md w-full rounded-lg border border-outline px-6 py-2 text-label-md text-on-surface-variant transition-all hover:bg-surface-container"
                    >
                        View All Courses
                    </button>
                </div>
            </div>
        </section>
    </div>
</template>
