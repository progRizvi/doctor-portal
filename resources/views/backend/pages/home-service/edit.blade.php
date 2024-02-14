@extends('backend.layout.app')
@section('title', 'Update Home Service')
@section('main')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('homeService.update', $homeService->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title<span
                        class="text-red-700">*</span></label>
                <input type="text" id="title" name="title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('title', $homeService->title) }}" required>
            </div>
            <div class="mb-6">
                <label for="bn_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla
                    Title</label>
                <input type="text" id="bn_title" name="bn_title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_title', $homeService->bn_title) }}">
                @error('bn_title')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('slug', $homeService->slug) }}">
                @error('slug')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone<span
                        class="text-red-700">*</span></label>
                <input type="text" id="phone" name="phone"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('phone', $homeService->phone) }}" required>
            </div>
            <div class="mb-6">
                <label class="dark:text-gray-200" for="description">Description</label>
                <textarea id="description" type="textarea" name="description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ old('description', $homeService->description) }}</textarea>
                @error('description')
                    <small class="text-red-700">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-6">
                <label for="meta_keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Keywords</label>
                <input type="text" id="meta_keywords" name="meta_keywords"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter keywords comma separated" value="{{ $homeService->meta_keywords }}">
            </div>
            <div class="mb-6">
                <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Description</label>
                <input type="text" id="meta_description" name="meta_description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter Description" value="{{ $homeService->meta_description }}">
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
            </button>
        </form>

    </div>
@endsection
@push('js')
    <script>
        makeEditor('#description');

        function makeEditor(selector) {
            ClassicEditor
                .create(document.querySelector(selector))
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endpush
