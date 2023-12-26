@extends('backend.layout.app')
@section('title', 'Update hospital')
@section('main')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('hospitals.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hospital
                    Name <span class="text-red-700">*</span></label>
                <input type="text" id="name" name="name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('name',$hospital->name) }}" required>
                @error('name')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hospital
                    Name in Bangla</label>
                <input type="text" id="bn_name" name="bn_name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_name',$hospital->bn_name) }}">
                @error('bn_name')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('slug',$hospital->slug) }}">

            </div>
            <div class="mb-6">
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                <input type="text" id="website" name="website"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('website',$hospital->website) }}">
            </div>
            <div class="mb-6">
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                            value="{{ old('email',$hospital->email) }}">
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
                            value="{{ old('phone',$hospital->phone) }}" required>
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
                    value="{{ old('address',$hospital->address) }}" required>
                @error('address')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address in Bangla</label>
                <input type="text" id="bn_address" name="bn_address"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_address',$hospital->bn_address) }}">
                @error('bn_address')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="division_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Division
                    <span class="text-red-700">*</span></label>
                <select name="division_id" id="division_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" required>
                    <option value="" selected>Select</option>
                    @foreach ($divisions as $division)
                        <option @if ($hospital->area->district->division_id == $division->id) selected @endif value="{{ $division->id }}">
                            {{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6 district">
                <label for="district_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District
                    <span class="text-red-700">*</span></label>
                <select name="district_id" id="district_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" required>
                    <option value="">Select</option>
                    <option value="{{ $hospital->area->district->id }}" selected>{{ $hospital->area->district->name }}
                    </option>
                </select>
            </div>
            <div class="mb-6 area">
                <label for="area_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area <span
                        class="text-red-700">*</span></label>
                <select name="area_id" id="area_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" required>
                    <option value="">Select</option>
                    <option value="{{ $hospital->area->id }}" selected>{{ $hospital->area->name }}</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                    <span class="text-red-700">*</span></label>
                <select name="type" id="type"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" required>
                    <option value="">Type</option>
                    <option value="hospital" @if ($hospital->type == 'hospital') selected @endif>Hospital</option>
                    <option value="clinic" @if ($hospital->type == 'clinic') selected @endif>Clinic</option>
                    <option value="diagnostic" @if ($hospital->type == 'diagnostic') selected @endif>Diagnostic</option>
                </select>
                @error('type')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status <span
                        class="text-red-700">*</span>
                </label>
                <select name="status" id="status"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" required>
                    <option value="">Select</option>
                    <option value="active" @if ($hospital->status == 'active') selected @endif>Active</option>
                    <option value="inactive" @if ($hospital->status == 'inactive') selected @endif>Inactive</option>
                </select>
                @error('status')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label class="dark:text-gray-200" for="description">Description <span
                        class="text-red-700">*</span></label>
                <textarea id="description" type="textarea" name="description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" required>{{ $hospital->description }}</textarea>
                @error('description')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-6">
                <label class="dark:text-gray-200" for="bn_description">Bangla Description</label>
                <textarea id="bn_description" type="textarea" name="bn_description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ $hospital->bn_description }}</textarea>
                @error('bn_description')
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
                            <label for="image-upload"
                                class="relative cursor-pointer bg-gray-100 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="">Upload an Image</span>
                                <input id="image-upload" name="image" type="file" class="sr-only">
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
            <div class="mb-6">
                <label for="meta_keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Keywords</label>
                <input type="text" id="meta_keywords" name="meta_keywords"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter keywords comma separated" value="{{ $hospital->meta_keywords }}">
            </div>
            <div class="mb-6">
                <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Description</label>
                <input type="text" id="meta_description" name="meta_description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter Description" value="{{ $hospital->meta_description }}">
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
            $('#division_id').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ route('get.district', '') }}",
                        type: "GET",
                        data: {
                            division_id: division_id
                        },
                        success: function(data) {
                            $('#district_id').empty();
                            $('#district_id').append(
                                '<option value="" selected>Select</option>'
                            );
                            $.each(data, function(key, value) {
                                $('#district_id').append('<option value="' +
                                    value.id + '">' + value.name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#district_id').empty();
                    $('#district_id').append('<option value="" selected>Select</option>');
                }
            });
            $('#district_id').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ route('doctor.get_areas', '') }}",
                        type: "GET",
                        data: {
                            district_id: district_id
                        },
                        success: function(data) {
                            $('#area_id').empty();
                            $('#area_id').append(
                                '<option value="" selected>Select</option>'
                            );
                            $.each(data, function(key, value) {
                                $('#area_id').append('<option value="' +
                                    value.id + '">' + value.name +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('#area_id').empty();
                    $('#area_id').append('<option value="" selected>Select</option>');
                }
            });
        });
        makeEditor('#description');
        makeEditor('#bn_description');
        function makeEditor(selector) {
            ClassicEditor
                .create(document.querySelector(selector))
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endpush
