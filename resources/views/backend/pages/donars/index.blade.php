@extends('backend.layout.app')

@section('title', 'Donars List')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">
        <div class="flex justify-end items-center px-6 py-4 bg-white border-t border-gray-200 dark:bg-gray-800 dark:text-white sm:px-8 sm:py-6">
            <form action="" method="get" class="flex">
                <input type="search" name="search" class="inline-block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" placeholder="search">
                <input type="submit" value="Search" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex justify-center items-center ml-2 cursor-pointer">
            </form>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Blood Group
                    </th><th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Donation Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donars as $donar)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $donar->name }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ ucfirst($donar->blood_group) }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($donar->status == 'pending')
                                <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                    Pending
                                </span>
                                @else
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Active
                                </span>
                            @endif
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $donar->last_donation_date }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $donar->area->name }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $donar->phone }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('donars.edit', $donar->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            {{-- delete --}}
                            <form action="{{ route('donars.destroy', $donar->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if ($donars->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center py-4 text-red-600 ">No Donars Found</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="my-4 px-6">
            {{ $donars->links('pagination::custom') }}
        </div>
    </div>

@endsection
