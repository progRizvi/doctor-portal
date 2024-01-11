@extends('backend.layout.app')

@section('title', 'Doctors List')
@section('main')

    <div class="sm:rounded-lg my-16 mx-10">
        <form action="" method="get">
            <div class="flex items-center justify-end w-1/3 ml-auto">
                <input type="text"
                    class='inline-block px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring'
                    name='search' value="{{ request()->search }}">
                <button type="submit"
                    class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Sl.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Doctor Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        specialist
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
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
                            {{ $loop->iteration }}
                        </th>
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
                            @if ($doctor->image)
                                <img src="{{ asset('public/uploads/doctors/' . $doctor->image) }}" alt="{{ $doctor->name }}"
                                    class="w-10 h-10 rounded-full">
                            @else
                                <img src="{{ asset("/images/$doctor->gender" . '_avatar.jpg') }}" alt="{{ $doctor->name }}"
                                    class="w-10 h-10 rounded-full">
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {!! Str::limit($doctor->bio, 10) !!}
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
                            @if ($doctor->top_doctor == 1)
                                <a href="{{ route('doctors.update.top-doctor.status', $doctor->id) }}"
                                    class="font-medium text-yellow-600 dark:text-yellow-400 hover:underline"
                                    title="Mark as Top Doctor">UnMark Top</a>
                            @else
                                <a href="{{ route('doctors.update.top-doctor.status', $doctor->id) }}"
                                    class="font-medium text-yellow-600 dark:text-yellow-400 hover:underline"
                                    title="Mark as Top Doctor">Mark Top</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
        </table>

        <div class="my-4 px-6">
            {{ $doctors->links('pagination::custom') }}
        </div>
    </div>

@endsection
