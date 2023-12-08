<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Search Results</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its
                        parent.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5" style="width: 60%">
        <form class="d-flex" action="{{ route('courses.search') }}" method="GET" role="search">
            <input class="form-control me-2 rounded-md" type="search" name="query" placeholder="Search"
                aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg"
                style="padding: 2%; background-color: rgb(223, 222, 222)">
                <div class="row">
                    @forelse ($results as $course)
                        <div class="col-md-4 mb-4">
                            <div class="card mx-auto shadow-lg" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-uppercase">{{ $course->course_name }}</h5>
                                    <h6 class="text-dark mb-3" style="font-size: 10px">{{ $course->user->name }}</h6>
                                    <p class="card-text mb-3">{{ Str::limit($course->description, 100) }}</p>
                                    <p class="mb-2" style="font-size: 12px">
                                        @php
                                            $startAt = $course->start_at;
                                            $endAt = $course->end_at;
                                            $diffInDays = now()->diffInDays($endAt);

                                            if ($diffInDays > 0) {
                                                echo 'Terisa ' . $diffInDays . ' hari lagi';
                                            } elseif ($diffInDays == 0) {
                                                echo 'Hari ini adalah hari terakhir';
                                            } else {
                                                echo 'Sudah melewati batas waktu';
                                            }
                                        @endphp
                                    </p>

                                    <div class="d-flex gap-2">
                                        @unless (auth()->user()->isRegisteredForCourse($course->id))
                                            <form class="btn btn-primary"
                                                action="{{ route('courses.register', ['course' => $course->id]) }}"
                                                method="POST" id="registrationForm{{ $course->id }}">
                                                @csrf
                                                <button type="submit">Register</button>
                                            </form>
                                        @endunless
                                        <a href="{{ route('courses.show', ['id' => $course->id]) }}"
                                            class="btn btn-warning">Details</a>
                                        <a href="" class="btn btn-success"><i
                                                class="fa-brands fa-whatsapp"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No courses available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
