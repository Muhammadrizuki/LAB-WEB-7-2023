<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // If the search query is empty, redirect back to the courses page
        if (empty($query)) {
            return redirect()->route('courses');
        }

        // Perform the search on the Course model
        $results = Course::where('course_name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return view('search-results', ['query' => $query, 'results' => $results]);
    }
}
