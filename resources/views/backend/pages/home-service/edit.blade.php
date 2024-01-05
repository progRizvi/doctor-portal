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
                <label class="block text-sm font-medium">
                    Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                            aria-hidden="true">
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
