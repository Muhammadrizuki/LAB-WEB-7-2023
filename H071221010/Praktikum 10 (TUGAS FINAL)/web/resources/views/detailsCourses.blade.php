<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">All Courses We Have</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its
                        parent.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="padding: 2%">
                <div class="row me-1">
                    <div class="col-md-12 mb-4">
                        <h1 class="fw-bold text-uppercase mb-1" style="font-size: 30px">{{ $course->course_name }}</h1>
                        <p class="mb-4">{{ $course->user->name }}</p>
                        <p style="font-size: 20px">{{ $course->description }}</p>
                    </div>
                    <a href="{{ route('courses') }}">
                        <div class="btn btn-danger">
                            Back
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
