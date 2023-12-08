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
            <a href="{{ route('user-management.index') }}">
                <div class="mb-3">
                    <span class="btn btn-danger">Back</span>
                </div>
            </a>
        </div>
        <div class="p-2 mx-auto rounded-lg" style="width:94%;background-color: wheat">
            <div style="width: 50%;" class="mx-auto p-3">
                <form action="{{ route('user-management.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <x-input-label for="title" :value="__('title')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autofocus
                            required autocomplete="title" />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="course_content" :value="__('course_content')" />
                        <x-text-input id="course_content" name="course_content" type="text" class="mt-1 block w-full" required
                            autocomplete="course_content" />
                        <x-input-error class="mt-2" :messages="$errors->get('course_content')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="course-id" :value="__('course-id')" />
                        <x-text-input id="course-id" name="course-id" type="text" class="mt-1 block w-full" required
                            autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('course-id')" />
                    </div>

                    <div class="flex justify-end ">
                        <button type="submit" class="px-4 py-2 text-light rounded badge bg-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

