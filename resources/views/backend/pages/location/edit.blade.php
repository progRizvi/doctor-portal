@extends('backend.layout.app')
@section('title', 'Update Area')
@section('main')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('areas.update', $area->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Name <span class="text-red-700">*</span></label>
                <input type="text" id="name" name="name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('name', $area->name) }}" required>
            </div>
            <div class="mb-6">
                <label for="bn_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla
                    Name </label>
                <input type="text" id="bn_name" name="bn_name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_name', $area->bn_name) }}">
            </div>
            <div class="mb-6">
                <label for="division" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division <span
                        class="text-red-700">*</span></label>
                <select id="division" name="division"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    required>
                    <option value="">Select Disivion</option>
                    @foreach ($divisions as $div)
                        <option @if ($area->district->division_id == $div->id) selected @endif value="{{ $div->id }}">
                            {{ $div->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District <span
                        class="text-red-700">*</span></label>
                <select id="district" name="district_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    required>
                    <option value=""> Select Disivion First</option>
                    <option selected value="{{ $area->district_id }}">{{ $area->district->name }}</option>
                </select>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
            </button>
        </form>

    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#division").on("change", function() {
                var division_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.district') }}",
                    type: "GET",
                    data: {
                        division_id: division_id
                    },
                    success: function(data) {
                        var html = "<option value=''>Select District</option>";
                        $.each(data, function(key, v) {
                            html += "<option value='" + v.id + "'>" + v.name +
                                "</option>";
                        });
                        $("#district").html(html);
                    }
                })
            })
        })
    </script>
@endpush
