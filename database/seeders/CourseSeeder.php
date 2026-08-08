<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = User::where('role', 'instructor')->get();
        $students = User::where('role', 'student')->get();

        if ($instructors->isEmpty()) {
            $this->command->warn('Belum ada user instructor. Jalankan UserSeeder dulu.');
            return;
        }

        $courseData = [
            ['title' => 'Belajar Laravel 12 dari Nol', 'price' => 299000, 'category' => 'Pemrograman'],
            ['title' => 'Vue 3 + Inertia untuk Pemula', 'price' => 249000, 'category' => 'Pemrograman'],
            ['title' => 'Dasar-Dasar UI/UX Design', 'price' => 0, 'category' => 'Desain'],
            ['title' => 'Manajemen Proyek Agile', 'price' => 199000, 'category' => 'Manajemen'],
        ];

        foreach ($courseData as $data) {
            $course = Course::create([
                'instructor_id' => $instructors->random()->id,
                'title' => $data['title'],
                'slug' => \Illuminate\Support\Str::slug($data['title']),
                'description' => "Kursus lengkap tentang {$data['title']}, mulai dari dasar sampai penerapan proyek nyata.",
                'category' => $data['category'],
                'price' => $data['price'],
                'status' => 'published',
            ]);

            // 3 modul per course, masing-masing 3 lesson
            foreach (range(1, 3) as $moduleOrder) {
                $module = Module::create([
                    'course_id' => $course->id,
                    'title' => "Modul {$moduleOrder}: Bagian {$moduleOrder}",
                    'order' => $moduleOrder,
                ]);

                foreach (range(1, 3) as $lessonOrder) {
                    Lesson::create([
                        'module_id' => $module->id,
                        'title' => "Lesson {$moduleOrder}.{$lessonOrder}",
                        'content_type' => $lessonOrder === 3 ? 'document' : 'video',
                        'content_url' => 'https://example.com/placeholder.mp4',
                        'duration_seconds' => 600,
                        'order' => $lessonOrder,
                    ]);
                }
            }

            // 1 quiz per course dengan 3 soal pilihan ganda
            $quiz = Quiz::create([
                'course_id' => $course->id,
                'title' => "Kuis Akhir: {$data['title']}",
                'time_limit_minutes' => 20,
                'passing_score' => 70,
            ]);

            foreach (range(1, 3) as $qOrder) {
                Question::create([
                    'quiz_id' => $quiz->id,
                    'question_text' => "Contoh soal nomor {$qOrder} untuk {$data['title']}?",
                    'question_type' => 'multiple_choice',
                    'options' => ['A' => 'Opsi A', 'B' => 'Opsi B', 'C' => 'Opsi C', 'D' => 'Opsi D'],
                    'correct_answer' => 'B',
                    'points' => 1,
                    'order' => $qOrder,
                ]);
            }

            // Enroll sebagian siswa secara acak ke tiap course
            foreach ($students->random(min(8, $students->count())) as $student) {
                Enrollment::updateOrCreate(
                    ['user_id' => $student->id, 'course_id' => $course->id],
                    [
                        'status' => 'active',
                        'progress' => fake()->randomFloat(2, 0, 100),
                    ]
                );
            }
        }
    }
}
