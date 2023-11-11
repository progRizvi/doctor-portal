@extends('backend.layout.app')
@section('title', 'Create Hospital')
@section('main')
    @if ($errors->count())
        {{-- @dd($errors->messages())  --}}
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('hospitals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hospital
                    Name <span class="text-red-700">*</span></label>
                <input type="text" id="name" name="name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror

            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">

            </div>
            <div class="mb-6">
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                <input type="text" id="website" name="website"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
            <div class="mb-6">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            value="{{ old('email') }}">
                        @error('email')
                            <small class="text-red-700">
                                    {{ $message }}
                                </small>
                        @enderror
                    </div>
                    <div class="w-1/2">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            <span class="text-red-700">*</span></label>
                        <input type="text" id="phone" name="phone"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            value="{{ old('phone') }}" required>
                        @error('phone')
                            @foreach ($errors->get('phone') as $message)
                                <small class="text-red-700">
                                    {{ $message }}
                                </small>
                                <br>
                            @endforeach
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address <span
                        class="text-red-700">*</span></label>
                <input type="text" id="address" name="address"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('address') }}" required>
                @error('address')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="department_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department
                    <span class="text-red-700">*</span></label>
                <select name="department_id[]" id="department_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring"
                    multiple>
                    <option value="" selected>Select</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="schedules">Schedules<span class="text-red-700">*</span> </label>
                @php
                    $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'all_day'];
                @endphp
                {{-- checkbox --}}
                <div class="flex flex-wrap">
                    @foreach ($days as $day)
                        <div class="w-1/2 days">
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" name="schedules[]" class="form-checkbox h-5 w-5 text-gray-600"
                                    value="{{ $day }}">
                                <span class="ml-2 text-gray-700">
                                    @if ($day == 'all_day')
                                        {{ ucfirst('all day') }}
                                    @else
                                        {{ ucfirst($day) }}
                                    @endif
                                </span>
                            </label>

                            <span class="hidden">
                                <input type="time" name="{{ $day }}_start_time" disabled>
                                <input type="time" name="{{ $day }}_end_time" class="form-controll" disabled>
                            </span>
                        </div>
                    @endforeach
                    @error('schedules')
                        <small class="text-red-700">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label for="division_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division
                    <span class="text-red-700">*</span></label>
                <select name="division_id" id="division_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected>Select</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6 district hidden">
                <label for="district_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District
                    <span class="text-red-700">*</span></label>
                <select name="district_id" id="district_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected>Select</option>
                </select>
            </div>
            <div class="mb-6 area hidden">
                <label for="area_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area <span
                        class="text-red-700">*</span></label>
                <select name="area_id" id="area_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected>Select</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                    <span class="text-red-700">*</span></label>
                <select name="type" id="type"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="">Type</option>
                    <option value="hospital">Hospital</option>
                    <option value="clinic">Clinic</option>
                </select>
                @error('type')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    </label>
                <select name="status" id="status"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="">Select</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label class="dark:text-gray-200" for="description">Description <span class="text-red-700">*</span></label>
                <textarea id="description" type="textarea" name="description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                @error('description')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium">
                    Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload"
                                class="relative cursor-pointer bg-gray-100 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="">Upload an Image</span>
                                <input id="file-upload" name="image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs">
                            PNG, JPG, JPEG
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium">
                    Background Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload"
                                class="relative cursor-pointer bg-gray-100 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="">Upload an Image</span>
                                <input id="file-upload" name="background_image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs">
                            PNG, JPG, JPEG
                        </p>
                    </div>
                </div>
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
            $("#division_id").change(function() {
                var division_id = $(this).val();
                var url = "{{ route('doctor.get_district', ':id') }}";
                url = url.replace(':id', division_id);
                getDataById(url, 'district');
            });
            $("#district_id").change(function() {
                var district_id = $(this).val();
                var url = "{{ route('doctor.get_areas', ':id') }}";
                url = url.replace(':id', district_id);
                getDataById(url, 'area');
            });
            $(document).ready(function() {
                $('#department_id').select2();
            });
            $(".days").click(function() {
                const day = $(this).find('input[type="checkbox"]');

                if ($(this).find('input[type="checkbox"]').is(":checked")) {
                    $(this).find('input[type="time"]').removeAttr('disabled');
                    $(this).find('span:not(.ml-2)').removeClass('hidden');

                } else {
                    $(this).find('input[type="time"]').attr('disabled', 'disabled');
                    $(this).find("span:not(.ml-2)").addClass('hidden');
                }
            })
        });

        function getDataById(url, idName) {
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="" selected>Select</option>';
                    $.each(data, function(key, value) {
                        html += '<option value="' + value.id + '">' + value.name +
                            '</option>';
                    });
                    $(`.${idName}.hidden`).removeClass("hidden");
                    $(`#${idName}_id`).html(html);
                }
            });

        }
    </script>
@endpush
