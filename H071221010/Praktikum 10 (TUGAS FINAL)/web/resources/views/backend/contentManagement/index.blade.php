<x-app-layout>
    <div class="py-2" style="margin-top: 20px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="height: 50%; padding: 5%;background-color:wheat">
                <div class="text-gray-900 mx-auto" style="text-align: center; font-weight: bolder; font-size: 30px;">
                    <h1 class="text-uppercase">Content Management Page</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('contentManagement.create') }}">
                <div class="mb-3">
                    <span class="btn btn-success">Create</span>
                </div>
            </a>
            <table class="table mx-auto rounded-lg">
                <thead>
                    <tr>
                        <th class="text-center align-middle" scope="col">Title</th>
                        <th class="text-center align-middle" scope="col">Course_Content</th>
                        <th class="text-center align-middle" scope="col">Course_ID</th>
                        <th class="text-center align-middle" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contents as $key => $content)
                        <tr>
                            <td class="text-center align-middle">{{ $content->title }}</td>
                            <td class="text-center align-middle">{{ $content->course_content }}</td>
                            <td class="text-center align-middle">{{ $content->course_id }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('user-management.edit', $content->id) }}">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <span class="badge bg-danger">Delete</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
