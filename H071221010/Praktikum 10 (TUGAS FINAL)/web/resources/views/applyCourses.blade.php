<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Your Applied Courses</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its
                        parent.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg"
                style="padding: 5%; background-color: rgb(223, 222, 222)">
                <div class="row">
                    @foreach ($courses as $registeredCourse)
                        <div class="col-md-4 mb-4">
                            <div class="card mx-auto shadow-lg" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-uppercase">
                                        {{ $registeredCourse->course->course_name }}</h5>
                                    <h3 class="text-dark mb-3" style="font-size: 10px">
                                        {{ $registeredCourse->course->user->name }}</h3>
                                    <p class="card-text mb-3">
                                        {{ Str::limit($registeredCourse->course->description, 100) }}</p>
                                    <a href="/courses/{{ $registeredCourse->course->id }}"
                                        class="btn btn-warning">Details</a>
                                    <a href="/courses/{{ $registeredCourse->course->id }}/content"
                                        class="btn btn-primary">Study</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
