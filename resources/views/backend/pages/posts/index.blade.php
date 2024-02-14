@extends('backend.layout.app')

@section('title', 'Post List')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">

        {{-- search box --}}
        <form action="">
            <div class="flex justify-end items-center p-6">
                <div class="flex items-center w-2/4">
                    <input type="text" id="search" name="search"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        placeholder="Search" value="{{ request()->search }}">
                </div>
                <div class="flex items-center w-1 justify-end mt-2 mr-4">
                    <button
                        class="px-4 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Search</button>
                </div>
            </div>
        </form>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Post Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Thumbnail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        content
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Posted at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('public/uploads/thumbnail/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                class="w-20 h-20 object-cover">
                        </td>
                        <td class="px-6 py-4">
                            {{-- take 10 words --}}
                            {!! Str::limit($post->content, 10) !!}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->posted_at)->timezone('UTC')->format('d-m-Y : g:i A') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="my-4 px-6">
            {{ $posts->links('pagination::custom') }}
        </div>
    </div>

@endsection
