<x-app-layout>
    <div class="py-2" style="margin-top: 20px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg" style="height: 50%; padding: 5%;background-color:wheat">
                <div class="text-gray-900 mx-auto" style="text-align: center; font-weight: bolder; font-size: 30px;">
                    <h1 class="text-uppercase">User Management Page</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="user-management/create">
                <div class="mb-3">
                    <span class="btn btn-success">Create</span>
                </div>
            </a>
            <table class="table mx-auto rounded-lg">
                <thead>
                    <tr>
                        <th class="text-center align-middle" scope="col">Name</th>
                        <th class="text-center align-middle" scope="col">Email</th>
                        <th class="text-center align-middle" scope="col">Role</th>
                        <th class="text-center align-middle" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td class="text-center align-middle">{{ $user->name }}</td>
                            <td class="text-center align-middle">{{ $user->email }}</td>
                            <td class="text-center align-middle">{{ $user->role }}</td>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('user-management.edit', $user->id) }}">
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
