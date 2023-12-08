<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\DB;

\Illuminate\Support\Facades\Cache::forget('CACHE_PREFIX');

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses', ['courses' => $courses]);
    }

    public function apply()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Retrieve the registered courses for the current user
        $registeredCourses = RegisteredCourse::where('user_id', $user->id)->get();

        return view('applyCourses', ['courses' => $registeredCourses]);
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('detailsCourses', compact('course'));
    }

    public function dashboard()
    {
        $popularCourses = DB::table('registered_courses')
            ->select('course_id', DB::raw('count(user_id) as total_users'))
            ->groupBy('course_id')
            ->orderByDesc('total_users')
            ->take(5)
            ->get();

        $courseIds = $popularCourses->pluck('course_id');

        $courses = Course::whereIn('id', $courseIds)->get();

        // Send data to the 'dashboard' view
        return view('dashboard', ['courses' => $courses]);
    }

    public function showContent(Course $course)
    {
        $contents = Content::where('course_id', $course->id)->get();

        return view('contents', compact('contents'));
    }

    public function showContentDetails($id)
    {
        // Retrieve the content based on the provided ID
        $content = Content::findOrFail($id);

        // Retrieve additional data or perform any logic if needed

        // Example: Load related course information
        $course = $content->course;

        // Return the view with the content details
        return view('contentDetails', compact('content', 'course'));
    }
}
