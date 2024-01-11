@extends('backend.layout.app')
@section('title', 'Home Page')
@section('main')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('pages.home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="heading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heading <span
                        class="text-red-700">*</span></label>
                <input type="text" id="heading" name="heading"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('heading',$homeContent?->heading) }}">
                @error('heading')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="bn_heading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla
                    Heading</label>
                <input type="text" id="bn_heading" name="bn_heading"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_heading',$homeContent?->bn_heading) }}">
                @error('bn_heading')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="sub_heading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub Heading
                    <span class="text-red-700">*</span></label>
                <input type="text" id="sub_heading" name="sub_heading"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('sub_heading',$homeContent?->sub_heading) }}">
                @error('sub_heading')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_sub_heading" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla Sub
                    Heading</label>
                <input type="text" id="bn_sub_heading" name="bn_sub_heading"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_sub_heading',$homeContent?->bn_sub_heading) }}">
                @error('bn_sub_heading')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="cta_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Call To Action
                    Button Text <span class="text-red-700">*</span></label>
                <input type="text" id="cta_text" name="cta_text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('cta_text',$homeContent?->cta_text) }}">
                @error('cta_text')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_cta_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Call To Action
                    Button Text Bangla</label>
                <input type="text" id="bn_cta_text" name="bn_cta_text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_cta_text',$homeContent?->bn_cta_text) }}">
                @error('bn_cta_text')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="cta_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Call To Action
                    Button Url <span class="text-red-700">*</span></label>
                <input type="text" id="cta_url" name="cta_url"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('cta_url',$homeContent?->cta_url) }}">
                @error('cta_url')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="summery" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Summery<span
                        class="text-red-700">*</span></label>
                <input type="text" id="summery" name="summery"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('summery',$homeContent?->summery) }}">
                @error('summery')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_summery" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla
                    Summery<span class="text-red-700">*</span></label>
                <input type="text" id="bn_summery" name="bn_summery"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_summery',$homeContent?->bn_summery) }}">
                @error('bn_summery')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="dark:text-gray-200" for="description">Description</label>
                <textarea id="description" name="description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ old('description',$homeContent?->description) }}</textarea>
                @error('description')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="dark:text-gray-200" for="bn_description">Description in Bangla</label>
                <textarea id="bn_description" name="bn_description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">{{ old('bn_description',$homeContent?->bn_description) }}</textarea>
                @error('bn_description')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium">
                    Slider Image<span class="text-red-700">*</span>
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
                            <label for="slider_image"
                                class="relative cursor-pointer bg-gray-100 rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="">Upload an Image</span>
                                <input id="slider_image" name="slider_image" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs">
                            PNG, JPG, JPEG
                        </p>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label for="meta_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Title</label>
                <input type="text" id="meta_title" name="meta_title"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter title comma separated" value="{{ old('meta_title',$homeContent?->meta_title) }}">
            </div>
            <div class="mb-6">
                <label for="meta_keywords" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Keywords</label>
                <input type="text" id="meta_keywords" name="meta_keywords"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter keywords comma separated" value="{{ old('meta_keywords',$homeContent?->meta_keywords) }}">
            </div>
            <div class="mb-6">
                <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Description</label>
                <input type="text" id="meta_description" name="meta_description"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    placeholder="Enter Description" value="{{ old('meta_description',$homeContent?->meta_description) }}">
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
            makeEditor('#description');
            makeEditor('#bn_description');
        });

        function makeEditor(selector) {
            ClassicEditor
                .create(document.querySelector(selector))
                .catch(error => {
                    console.error(error);
                });
        }
    </script>
@endpush
