<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class CourseController extends Controller
{
    public function index(Request $request): Response
    {
        $courses = DB::table('courses')
            ->join('users', 'courses.instructor_id', '=', 'users.id')
            ->where('courses.status', 'published')
            ->when($request->category, function ($query, $category) {
                return $query->where('courses.category', $category);
            })
            ->when($request->search, function ($query, $search) {
                return $query->where('courses.title', 'ilike', "%{$search}%");
            })
            ->select(
                'courses.id',
                'courses.title',
                'courses.slug',
                'courses.category',
                'courses.price',
                'courses.status',
                'courses.instructor_id',
                'users.name as instructor_name',
                'users.avatar as instructor_avatar'
            )
            ->latest('courses.created_at')
            ->paginate(10);

        return Inertia::render('courses/index', [
            'courses' => $courses,
            'filters' => $request->only([
                'category',
                'search',
            ]),
        ]);
    }

    public function create(): Response
    {
        Gate::authorize('create', Course::class);
        return Inertia::render('courses/create');
    }

    function show(Course $course): Response
    {
        return Inertia::render('courses/show', [
            'course' => $course->load('instructor:id,name,avatar'),
        ]);
    }
}
