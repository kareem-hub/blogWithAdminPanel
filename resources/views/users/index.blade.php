<x-app-layout>
    <x-slot name="header">
        <h2 class="inline font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
        <a class="mx-5 inline items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ route('users.create') }}">Add a user</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">permissions</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->getDirectPermissions() as $p)
                                                <span
                                                    class="badge text-sm text-light bg-info">{{ $p->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="block items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                href="{{ route('users.edit', $user) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('users.destroy', $user) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="block items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                    type="submit"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div>{{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
