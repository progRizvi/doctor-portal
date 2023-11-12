@extends('backend.layout.app')

@section('title', 'Doctors List')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Doctor Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Spialists
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
                        Bio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $doctor->name }}
                        </th>
                        <td class="px-6 py-4">
                            @foreach ($doctor->departments as $department)
                                @if ($loop->last)
                                    {{ $department->name }}
                                @else
                                    {{ $department->name }} ,
                                @endif
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            {{ $doctor->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $doctor->address }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($doctor->image)
                                <img src="{{ asset('public/uploads/doctors/' . $doctor->image) }}" alt="{{ $doctor->name }}"
                                    class="w-10 h-10 rounded-full">
                            @else
                                <img src="{{ asset("/images/$doctor->gender" . '_avatar.jpg') }}" alt="{{ $doctor->name }}"
                                    class="w-10 h-10 rounded-full">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ Str::limit($doctor->bio, 10) }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('doctors.edit', $doctor->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST"
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
            {{ $doctors->links('pagination::custom') }}
        </div>
    </div>

@endsection
