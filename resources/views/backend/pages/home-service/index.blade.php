@extends('backend.layout.app')

@section('title', 'Home Service')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($homeServices as $homeService)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $homeService->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $homeService->phone }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('homeService.edit', $homeService->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            
                            <form action="{{ route('homeService.destroy', $homeService->id) }}" method="POST"
                                class="inline-block">
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
            {{ $homeServices->links('pagination::custom') }}
        </div>
    </div>

@endsection
