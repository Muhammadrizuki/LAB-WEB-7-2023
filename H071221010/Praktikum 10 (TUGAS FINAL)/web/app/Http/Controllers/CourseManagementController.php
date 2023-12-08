<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class CourseManagementController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('backend.courseManagement.index', compact('courses'));
    }

    public function create()
    {
        return view('backend.courseManagement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'description' => 'required',
            'user_id' => 'required|unique:users',
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        Course::create($request->all());

        return redirect()->route('courseManagement.index')->with('success', 'Course Management created successfully');
    }

    public function edit(CourseManagement $courseManagement)
    {
        return view('backend.courseManagement.edit', compact('courseManagement'));
    }

    public function update(Request $request, CourseManagement $courseManagement)
    {
        $request->validate([
            'name' => 'required',
            // Add validation rules for other fields
        ]);

        $courseManagement->update($request->all());

        return redirect()->route('courseManagement.index')->with('success', 'Course Management updated successfully');
    }

    public function destroy(CourseManagement $courseManagement)
    {
        $courseManagement->delete();

        return redirect()->route('courseManagement.index')->with('success', 'Course Management deleted successfully');
    }
}
