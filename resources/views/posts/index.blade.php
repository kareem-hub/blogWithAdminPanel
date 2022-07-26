<x-app-layout>
    <x-slot name="header">
        <h2 class="inline font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <a class="mx-5 inline items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ route('posts.create') }}">Add a post</a>
        <!-- Search widget-->
        <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <form action="">
                    <div class="input-group">
                        <input
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="term" type="search" placeholder="Enter search term..." value="{{ $term }}"
                            aria-label="Enter search term..." aria-describedby="button-search" />
                        <button
                            class="ml-2 inline items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            id="button-search" type="submit">Go!</button>
                    </div>
                </form>
                <a class="mt-5 inline items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    href="{{ url('/posts') }}">
                    <button id="button-search" type="reset">Reset</button>
                </a>
            </div>
        </div>
    </x-slot>

    <!-- post card -->
    <div class="">
        @foreach ($posts as $post)
            <div
                class="basis-1/4 m-5 p-6 max-w bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $post->title }}
                    </h5>
                    <small class="text-gray-500">{{ $post->category->name }}</small>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->text }}</p>

                <a class=" items-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    href="{{ route('posts.edit', $post) }}">Edit</a>
                <form class="inline" method="POST" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="mx-3 items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-app-layout>
