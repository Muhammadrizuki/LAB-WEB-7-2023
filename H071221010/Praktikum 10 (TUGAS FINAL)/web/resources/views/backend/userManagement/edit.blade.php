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
            <a href="{{ route('user-management.index') }}">
                <div class="mb-3">
                    <span class="btn btn-danger">Back</span>
                </div>
            </a>
        </div>
        <div class="p-2 mx-auto rounded-lg" style="width:94%;background-color: wheat">
            <div style="width: 50%;" class="mx-auto p-3">
                <form action="{{ route('user-management.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Gunakan method PUT untuk operasi update --}}

                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" autofocus
                            required autocomplete="name" :value="$user->name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" required
                            autocomplete="username" :value="$user->username" />
                        <x-input-error class="mt-2" :messages="$errors->get('username')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required
                            autocomplete="username" :value="$user->email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-password-input id="password" name="password" class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div class="flex justify-end ">
                        <button type="submit" class="px-4 py-2 text-light rounded badge bg-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
