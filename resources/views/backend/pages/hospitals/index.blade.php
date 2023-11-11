@extends('backend.layout.app')

@section('title', 'Hospital List')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Hospital Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        About
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $hospital->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $hospital->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $hospital->address }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($hospital->image)

                                <img src="{{ asset('uploads/hospitals/' . $hospital->image) }}" alt="{{ $hospital->name }}"
                                    class="w-10 h-10 rounded-full">
                            @else
                                <img src="{{ asset("/images/hospital.svg") }}" alt="{{ $hospital->name }}"
                                    class="w-10 h-10 rounded-full">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($hospital->description, 10) }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('hospitals.edit', $hospital->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('hospitals.destroy', $hospital->id) }}" method="POST"
                                class="inline-flex ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-400 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>

        <div class="my-4 px-6">
            {{ $hospitals->links('pagination::custom') }}
        </div>
    </div>

@endsection
