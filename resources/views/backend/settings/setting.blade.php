@extends('backend.layout.app')
@section('title')
Settings
@endsection
@section('main')
<!-- labels on left  -->
<form action="{{route('settings.update')}}" method="POST" class=" px-6 py-6 rounded-md space-y-7" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$setting->id}}">
    <div class="bg-white py-12 rounded-lg shadow-md space-y-4">
        <div class="px-10">
            <label for="logo" class="block text-sm leading-5 font-medium text-gray-700">
                Logo<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="logo" name="logo" type="file"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your logo" />
            </div>
            @error('logo')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="company_name" class="block text-sm leading-5 font-medium text-gray-700">
                Company name<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="name" value="{{$setting->company_name}}" name="name" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company name" />
            </div>
            @error('name')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="address" class="block text-sm leading-5 font-medium text-gray-700">
                Address<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="address" value="{{$setting->address}}" name="address" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company address" />
            </div>
            @error('address')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="email" class="block text-sm leading-5 font-medium text-gray-700">
                Email<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="email" value="{{$setting->email}}" name="email" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company email" />
            </div>
            @error('email')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="phone" class="block text-sm leading-5 font-medium text-gray-700">
                Phone<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="phone" value="{{$setting->phone_number}}" name="phone" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company phone" />
            </div>
            @error('phone')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="google_location" class="block text-sm leading-5 font-medium text-gray-700">
                Google Location<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="google_location" value="{{$setting->google_location}}" name="google_location" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company google_location" />
            </div>
            @error('google_location')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="web_address" class="block text-sm leading-5 font-medium text-gray-700">
                Web address<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="web_address" value="{{$setting->web_address}}" name="web_address" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company web_address" />
            </div>
            @error('web_address')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="facebook" class="block text-sm leading-5 font-medium text-gray-700">
                Facebook<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="facebook" value="{{$setting->facebook}}" name="facebook" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company facebook" />
            </div>
            @error('facebook')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="twitter" class="block text-sm leading-5 font-medium text-gray-700">
                Twitter<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="twitter" value="{{$setting->twitter}}" name="twitter" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company twitter" />
            </div>
            @error('twitter')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="instagram" class="block text-sm leading-5 font-medium text-gray-700">
                Instagram<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="instagram" value="{{$setting->instagram}}" name="instagram" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company instagram" />
            </div>
            @error('instagram')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="youtube" class="block text-sm leading-5 font-medium text-gray-700">
                Youtube<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="youtube" value="{{$setting->youtube}}" name="youtube" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company youtube" />
            </div>
            @error('youtube')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="youtube" class="block text-sm leading-5 font-medium text-gray-700">
                Youtube<span class="text-red-600"> * </span>
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="youtube" value="{{$setting->youtube}}" name="youtube" type="text"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:ring-2 focus:border-blue-200 focus:outline-none"
                    placeholder="Enter your company youtube" />
            </div>
            @error('youtube')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">Tag line</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <textarea id="tag_line" name="tag_line" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            "  rows="3" placeholder="Your message">{{$setting->tag_line}}</textarea>
            </div>
            @error('tag_line')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">about us</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <textarea id="about_us" name="about_us" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            "  rows="3" placeholder="Your message">{{$setting->about_us}}</textarea>
            </div>
            @error('about_us')<span class="text-red-600">{{$message}}</span>@enderror
        </div>

        <div class="px-10">
            <label for="exampleFormControlTextarea1" class="form-label inline-block mb-2 text-gray-700">Terms and Conditions</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <textarea id="terms_and_conditions" name="terms_and_conditions" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            "  rows="3" placeholder="Your message">{{$setting->terms_and_conditions}}</textarea>
            </div>
            @error('terms_and_conditions')<span class="text-red-600">{{$message}}</span>@enderror
        </div>


        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
            </div>
        </div>
    </div>
</form>

<script>
    ClassicEditor
        .create( document.querySelector( '#terms_and_conditions' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#about_us' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#tag_line' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
