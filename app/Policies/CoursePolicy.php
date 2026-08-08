<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(User $user, Course $course): bool
    {
        if ($course->status === 'published') {
            return true;
        }

        return $user && ($user->id === $course->instructor_id || $user->isSuperAdmin());
    }

    public function create(User $user): bool
    {
        return $user->isInstructor() || $user->isSuperAdmin();
    }

    public function update(User $user, Course $course): bool
    {
        return $user->isSuperAdmin() || $user->id === $course->instructor_id;
    }

    public function delete(User $user, Course $course): bool
    {
        return $user->isSuperAdmin() || $user->id === $course->instructor_id;
    }

    public function publish(User $user, Course $course): bool
    {
        return $user->isSuperAdmin();
    }
}
