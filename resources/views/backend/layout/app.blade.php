<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <!-- Include stylesheet -->
    {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="{{ asset('backend/js/app.js') }}" defer></script>
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    @notifyCss
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    {{-- font awesome cdn --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


    @stack('css')

</head>

<body class="antialiased">
    <div class="h-screen flex overflow-hidden bg-gray-100" x-data="{ open: false, showModal: false }">
        <!-- Off-canvas menu for mobile -->


        <!-- Static sidebar for desktop -->
        @includeIf('backend.partials.sidebar')
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
                <button @click="open=true"
                    class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150"
                    aria-label="Open sidebar">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <main class="flex-1 relative z-0 overflow-y-auto pb-6 focus:outline-none" tabindex="0">
                <div class="shadow-lg bg-white flex justify-between lg:px-8 mx-auto p-5 px-4 sm:px-6 text-black">
                    <!-- <div class=" font-semibold text-2xl inline-block">My Team</div> -->
                    <div class="text-2xl font-bold">
                        @yield('title')
                        <!-- Dashboard -->
                    </div>

                    <div class="flex items-center  flex-shrink-0 px-4">
                        <img class="border border-black h-8 rounded-full w-auto" src="{{ auth()->user()->image }}"
                            alt="admin">
                        <a href="{{ route('user.profile', auth()->user()->id) }}"><span
                                class=" font-semibold ml-3 inline-block">{{ auth()->user()->name }}</span></a>
                    </div>

                </div>

                <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 "> -->
                <!-- Replace with your content -->

                {{-- Laravel 7 or greater --}}
                <x:notify-messages />
                @notifyJs
                <div class="bg-gray-100">
                    @yield('main')
                </div>
                <!-- /End replace -->
            </main>
        </div>
    </div>

    {{-- jquery cdn --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/datepicker.min.js"></script>

    {!! Toastr::message() !!}


    @stack('js')

    <script src="js/app.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.6/dist/datepicker.js"></script>
</body>

</html>
