<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class UpdatePopularCourses implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserLoggedIn $event)
    {
        // Your logic to update popular courses based on the event data
        // You can access the user who logged in with $event->user

        $popularCourses = DB::table('registered_courses')
            ->select('course_id', DB::raw('count(*) as total'))
            ->groupBy('course_id')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $courseIds = $popularCourses->pluck('course_id');

        $courses = Course::whereIn('id', $courseIds)->get();

        // Fetch the user counts for each popular course
        $userCounts = DB::table('registered_courses')
            ->select('course_id', DB::raw('count(*) as user_count'))
            ->whereIn('course_id', $courseIds)
            ->groupBy('course_id')
            ->get()
            ->pluck('user_count', 'course_id');

        // Attach user count information to each course
        $courses = $courses->map(function ($course) use ($userCounts) {
            $course->user_count = $userCounts->get($course->id, 0);
            return $course;
        });

        // You can now use $courses to update your view or perform any other actions
    }
}
