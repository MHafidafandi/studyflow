export interface Lesson {
    id: string;
    module_id: string;
    title: string;
    content_type: contentType;
    content_url: string;
    content_body: string;
    duration_second: number;
    order: number;
}

type contentType = 'video' | 'document' | 'article';
