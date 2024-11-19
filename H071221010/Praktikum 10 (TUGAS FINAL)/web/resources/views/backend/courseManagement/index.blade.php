<x-app-layout>
    <div class="py-2" style="margin-top: 20px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="height: 50%; padding: 5%;background-color:wheat">
                <div class="text-gray-900 mx-auto" style="text-align: center; font-weight: bolder; font-size: 30px;">
                    <h1 class="text-uppercase">Course Management Page</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="courseManagement/create">
                    <div class="mb-3">
                        <span class="btn btn-success">Create</span>
                    </div>
                </a>

            <table class="table mx-auto rounded-lg">
                <thead>
                    <tr>
                        <th class="text-center align-middle" scope="col">Courses Name</th>
                        <th class="text-center align-middle" scope="col">Description</th>
                        <th class="text-center align-middle" scope="col">ID Teacher</th>
                        <th class="text-center align-middle" scope="col">Start Date</th>
                        <th class="text-center align-middle" scope="col">End Date</th>
                        <th class="text-center align-middle" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $key => $course)
                        <tr>
                            <td class="text-center align-middle">{{ $course->course_name }}</td>
                            <td class="text-center align-middle">{{ $course->description }}</td>
                            <td class="text-center align-middle">{{ $course->user_id }}</td>
                            <td class="text-center align-middle">{{ $course->start_at }}</td>
                            <td class="text-center align-middle">{{ $course->end_at }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('user-management.edit', $course->id) }}">
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
