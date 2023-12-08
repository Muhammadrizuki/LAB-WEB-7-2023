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
                        <x-input-label for="course-name" :value="__('course-name')" />
                        <x-text-input id="course-name" name="course-name" type="text" class="mt-1 block w-full" autofocus
                            required autocomplete="course-name" />
                        <x-input-error class="mt-2" :messages="$errors->get('course-name')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="description" :value="__('description')" />
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" required
                            autocomplete="description" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="id-teacher" :value="__('id-teacher')" />
                        <x-text-input id="id-teacher" name="id-teacher" type="text" class="mt-1 block w-full" required
                            autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('id-teacher')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="start-at" :value="__('start-at')" />
                        <input id="start-at" name="start-at" type="date" class="mt-1 block w-full rounded-lg"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('start-at')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="end-at" :value="__('end-at')" />
                        <input id="end-at" name="end-at" type="date" class="mt-1 block w-full rounded-lg"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('end-at')" />
                    </div>

                    <div class="flex justify-end ">
                        <button type="submit" class="px-4 py-2 text-light rounded badge bg-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
