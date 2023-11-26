@extends('backend.layout.app')
@section('title', 'Languages List')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-16 mx-10">

        <form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Word</th>
                        <th scope="col" class="px-6 py-3">English</th>
                        <th scope="col" class="px-6 py-3">Bangla</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($words as $row)
                    {{-- @dd($row) --}}
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ ucwords(str_replace('_', ' ', $row->word)) }}</td>
                            
                            <td>
                                <div style="width: 100%">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="far fa-comment-alt"></i></span>
                                        </span>
                                        <input type="text" placeholder = 'Set Word Translation' class = 'form-control'
                                            value="{{ $row->english }}" name="{{ $row->word }}[english]">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div style="width: 100%">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="far fa-comment-alt"></i></span>
                                        </span>
                                        <input type="text" placeholder = 'Set Word Translation' class = 'form-control'
                                            value="{{ $row->bangla }}" name="{{ $row->word }}[bangla]">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
            </button>
        </form>
        <div class="my-4 px-6">
            {{ $words->links('pagination::custom') }}
        </div>
    </div>
@endsection
