<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;

class RegisteredCourseController extends Controller
{
    public function register(Course $course)
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Check if the user is already registered for the course
        if (!$user->isRegisteredForCourse($course->id)) {
            // Register the user for the course and save to the pivot table
            $user->courses()->attach($course, ['created_at' => now(), 'updated_at' => now()]);

            return redirect()->back()->with('success', 'Anda telah berhasil mendaftar untuk kursus.');
        }

        return redirect()->back()->with('error', 'Anda sudah terdaftar untuk kursus ini.');
    }
}
