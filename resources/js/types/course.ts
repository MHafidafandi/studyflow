import type { Lesson } from './lesson';
import type { Module } from './module';

export type course = {
    id: number;
    thumbnail: string;
    is_best_seller: boolean;
    star: string;
    review: number;
    title: string;
    author: string;
    price: string;
};

export interface Instructor {
    instructor_id: string;
    instructor_name: string;
    instructor_avatar: string | null;
}

export interface Course extends Instructor {
    id: string;
    title: string;
    description: string;
    slug: string;
    category: string;
    thumbnail: string;
    price: number;
}

export interface PaginatedCourses {
    data: Course[];
    links: { url: string | null; label: string; active: boolean }[];
    current_page: number;
    first_page_url: string;
    from: number;
    to: number;
    last_page: number;
    last_page_url: string;
    next_page_url: string;
    prev_page_url: string;
    total: number;
    per_page: number;
}

export interface CreateCourseForm {
    course: Course;
    Modules: Module[];
    Lessons: Lesson[];
}
