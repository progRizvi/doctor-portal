@extends('backend.layout.app')
@section('title', 'Update Extra data')
@section('main')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('extra.update', ['extra' => $extraInfo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title <span
                        class="text-red-700">*</span></label>
                <input type="text" id="title" name="title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('title',$extraInfo->title) }}">
                @error('title')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla Title</label>
                <input type="text" id="bn_title" name="bn_title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_title',$extraInfo->bn_title) }}">
            </div>
            <div class="mb-6">
                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area<span
                        class="text-red-700">*</span></label>
                <select id="area" name="area_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected disabled>Select</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" @if ($extraInfo->area_id == $area->id)
                            selected
                        @endif>{{ $area->name }}</option>
                    @endforeach
                </select>
                @error('area_id')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department<span
                        class="text-red-700">*</span></label>
                <select id="department" name="department_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" >Select</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" @if ($extraInfo->department_id == $department->id)
                            selected
                        @endif
                            >{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="for" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">For<span
                        class="text-red-700">*</span></label>
                <select id="for" name="for"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" disabled> Select</option>
                    <option value="doctor" @if ($extraInfo->for == 'doctor')
                        selected
                    @endif>Doctor</option>
                    <option value="hospital" @if ($extraInfo->for == 'hospital')
                        selected
                    @endif>Hospital</option>
                    <option value="surgery" @if ($extraInfo->for == 'surgery')
                        selected
                    @endif>Surgery & Support</option>
                    <option value="homeService" @if ($extraInfo->for == 'homeService')
                        selected
                    @endif>Home Service</option>
                </select>
                 @error('for')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" type="textarea" name="description" rows="10" minHeight="500"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{!! $extraInfo->description !!}</textarea>
            </div>
            <div class="mb-6">
                <label for="bn_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla Description</label>
                <textarea id="bn_description" type="textarea" name="bn_description" rows="10" minHeight="500"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{!! $extraInfo->bn_description !!}</textarea>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
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
    <script>
        // add editor
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#bn_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
