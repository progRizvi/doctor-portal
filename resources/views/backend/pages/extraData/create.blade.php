@extends('backend.layout.app')
@section('title', 'Create Extra Data')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('extra.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title <span
                        class="text-red-700">*</span></label>
                <input type="text" id="title" name="title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('title') }}">
                @error('title')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla Title</label>
                <input type="text" id="bn_title" name="bn_title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_title') }}">
            </div>
            <div class="mb-6">
                <label for="for" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">For<span
                        class="text-red-700">*</span></label>
                <select id="for" name="for"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected disabled> Select</option>
                    <option value="doctor">Doctor</option>
                    <option value="hospital">Hospital</option>
                    <option value="surgery">Surgery & Support</option>
                    <option value="homeService">Home Service</option>
                    <option value="bloodClub">Blood Club</option>
                </select>
                 @error('for')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6" style="display: none">
                <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area<span
                        class="text-red-700">*</span></label>
                <select id="area" name="area_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected disabled>Select</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
                @error('area_id')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6" style="display: none">
                <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department<span
                        class="text-red-700">*</span></label>
                <select id="department" name="department_id"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected>Select</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" type="textarea" name="description" rows="10" minHeight="500"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="mb-6">
                <label for="bn_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla Description</label>
                <textarea id="bn_description" type="textarea" name="bn_description" rows="10" minHeight="500"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="mb-6">
                <label for="meta_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Title</label>
                <input type="text" id="meta_title" name="meta_title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter title">
            </div>
            <div class="mb-6">
                <label for="meta_keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Keywords</label>
                <input type="text" id="meta_keywords" name="meta_keywords"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter keywords comma separated">
            </div>
            <div class="mb-6">
                <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Description</label>
                <input type="text" id="meta_description" name="meta_description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter Description">
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

            $("#for").change(function(){
                var for_id = $(this).val();
                if(for_id == 'doctor'){
                    $("#area").parent().show();
                    $("#department").parent().show();
                }else if(for_id == 'hospital'){
                    $("#area").parent().show();
                    $("#department").parent().hide();
                }else if(for_id == 'surgery'){
                    $("#area").parent().hide();
                    $("#department").parent().hide();
                }else if(for_id == 'homeService'){
                    $("#area").parent().hide();
                    $("#department").parent().hide();
                }else if(for_id == 'bloodClub'){
                    $("#area").parent().hide();
                    $("#department").parent().hide();
                }
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
