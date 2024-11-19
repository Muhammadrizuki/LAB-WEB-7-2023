<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4 text-uppercase">{{ $contents[0]->course->course_name }}</h1>
                    <p class="lead">{{ $contents[0]->course->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-7">
        @foreach ($contents as $content)
            <a href="/content/{{ $content->id }}">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="padding: 2%">
                        <div class="row me-1">
                            <h1 class="text-uppercase" style="font-weight: 800">{{ $content->title }}</h1>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
            <div>
                <a href="/apply">
                    <div class="btn btn-danger">
                        Back
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
