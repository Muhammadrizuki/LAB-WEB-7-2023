<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="height: 100%; padding: 10%;">
                <div class="text-gray-900 mx-auto"
                    style="text-align: center; font-weight: bolder; font-size: 55px; padding-left: 10%; padding-right: 10%">
                    <h1>WeBelajar</h1>
                </div>
                <div class="text-gray-900 mt-3"
                    style="text-align: center; font-size: 17px; padding-left: 19%; padding-right: 19%">
                    <p>
                        Tempat belajar online solusi studi Anda! Dengan konten pembelajaran
                        yang disesuaikan dengan kebutuhan Anda, kami bertujuan membantu
                        Anda mencapai kesuksesan dalam studi Anda.
                    </p>
                </div>
                <div class="container-fluid p-3" style="width: 60%">
                    <form class="d-flex" action="{{ route('courses.search') }}" method="GET" role="search">
                        <input class="form-control me-2 rounded-md" type="search" name="query" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg"
                style="padding: 2%;background-color: rgb(223, 222, 222)">
                <div id="courseCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($courses as $key => $course)
                            <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                <div class="row">
                                    <div class="col-md-10 mx-auto">
                                        <div class="card mx-auto" style="width: 100%;">
                                            <div class="card-body">
                                                <p class="text-dark mb-2 badge"
                                                    style="font-size: 14px;background-color:rgb(255, 255, 0)">
                                                    Popular
                                                    Courses
                                                    #{{ $key + 1 }}</p>
                                                <h5 class="card-title fw-bold text-uppercase">{{ $course->course_name }}
                                                </h5>
                                                <h3 class="text-dark mb-3" style="font-size: 10px">
                                                    {{-- {{ $course->user->name }}</h3> --}}
                                                <p class="card-text mb-3">{{ Str::limit($course->description, 100) }}
                                                </p>
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
                                                <div class="d-flex gap-2 mx-auto">
                                                    @if (auth()->user()->isRegisteredForCourse($course->id))
                                                        <!-- Jika sudah mendaftar, tombol Regist akan disembunyikan -->
                                                    @else
                                                        <form class="btn btn-primary"
                                                            action="{{ route('courses.register', ['course' => $course->id]) }}"
                                                            method="POST" id="registrationForm{{ $course->id }}">
                                                            @csrf
                                                            <button type="submit">Regist</button>
                                                        </form>
                                                    @endif
                                                    <a href="{{ route('courses.show', ['id' => $course->id]) }}"
                                                        class="btn btn-warning">Details</a>
                                                    <a href="" class="btn btn-success"><i
                                                            class="fa-brands fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#courseCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#courseCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
