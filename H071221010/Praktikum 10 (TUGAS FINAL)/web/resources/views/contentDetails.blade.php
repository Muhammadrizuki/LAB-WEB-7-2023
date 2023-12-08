<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">DETAIL CONTENT</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its
                        parent.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="padding: 2%">
                <div class="row me-1">
                    <h1 class="text-uppercase mb-5" style="font-weight: 800; font-size: 40px">{{ $content->title }}</h1>
                    <p style="font-size: 20px">{{ $content->course_content }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div>
                <a href="/courses/{{ $content->course->id }}/content">
                    <div class="btn btn-danger">
                        Back
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
