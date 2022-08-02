<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
                                            role="alert">
                                            <span class="font-medium">Warning alert! </span>{{ $error }}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <input id="name" class="block mt-1 w-full" type="text" name="name"
                                value={{ $user->name }} required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <input id="email" class="block mt-1 w-full" type="email" name="email"
                                value={{ $user->email }} required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <input id="password" class="block mt-1 w-full" type="password" name="password" required
                                value={{ $user->password }} autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('Confirm Password')" />

                            <input id="password_confirmation" class="block mt-1 w-full" type="password"
                                value={{ $user->password }} name="password_confirmation" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="permissions" :value="__('Select Permissions')" />

                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                {{-- @foreach ($permissions as $p)
                                    <option value={{ $p->id }}>{{ $p->name }}</option>
                                @endforeach --}}
                                @foreach ($permissions as $p)
                                    <option value="{{ $p->id }}"
                                        @if ($user->hasPermissionTo($p->id)) selected='selected' @endif>
                                        {{ $p->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> --}}

                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
