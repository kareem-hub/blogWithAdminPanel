<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
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
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <label for="title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Title</label>
                        <input
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            type="text" name="title" id="" />
                        <br /><br />
                        <label for="text"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Body</label>
                        <textarea rows="4" name="text"
                            class="block p-2.5 w-2/3 text-sm text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Body"></textarea>
                        <br />
                        <label for="category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Category</label>
                        <select name="category_id" id="">
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                        <br><br>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
