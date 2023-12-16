<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-white">
        <div class="h-0 flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="h-8 ml-8 w-auto rounded-full" src="{{ $settings->logo }}" alt="logo" />

                    {{-- <span class="text-black font-semibold ml-3 inline-block">{{$settings->company_name}}</span>
                    --}}
                </div>
            </a>
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <nav class="mt-5 flex-1 px-2 bg-white">

                <a href="{{ route('admin.dashboard') }}"
                    class=" group flex items-center px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none  transition ease-in-out duration-150">
                    <svg class="mr-3 h-6 w-6 text-gray-600 group-hover:text-gray-800 group-focus:text-gray-100 transition ease-in-out duration-150"
                        stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6" />
                    </svg>
                    Dashboard
                </a>

                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Location
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        @if(hasAnyPermissions('areas.index'))
                        <li><a href="{{ route('areas.index') }}" class="block py-2 ml-3">Area</a></li>
                        @endif
                        @if(hasAnyPermissions('areas.create'))
                        <li><a href="{{ route('areas.create') }}" class="block py-2 ml-3">Create Area</a></li>
                        @endif
                    </ul>
                </div>
                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Departments
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        @if (hasAnyPermissions('departments.index'))
                        <li><a href="{{ route('departments.index') }}" class="block py-2 ml-3">Departments</a></li>
                        @endif
                        @if (hasAnyPermissions('departments.create'))
                        <li><a href="{{ route('departments.create') }}" class="block py-2 ml-3">Create Department</a></li>
                        @endif
                    </ul>
                </div>
                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Extra Data
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        <li><a href="{{ route('extra.index') }}" class="block py-2 ml-3">Extra Data</a></li>
                        <li><a href="{{ route('extra.create') }}" class="block py-2 ml-3">Create Extra Data</a></li>

                    </ul>
                </div>
                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Surgery & Support
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        <li><a href="{{ route('surgerySupport.index') }}" class="block py-2 ml-3">Surgery & Support List</a></li>
                        <li><a href="{{ route('surgerySupport.create') }}" class="block py-2 ml-3">Create Surgery & Support</a></li>

                    </ul>
                </div>
                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Doctors
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        @if (hasAnyPermissions('doctors.index'))
                        <li><a href="{{ route('doctors.index') }}" class="block py-2 ml-3">Doctors List</a></li>
                        @endif
                        @if (hasAnyPermissions('doctors.create'))
                        <li><a href="{{ route('doctors.create') }}" class="block py-2 ml-3">Add Doctor</a></li>
                        @endif
                    </ul>
                </div>
                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Hospital
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        @if (hasAnyPermissions('hospitals.index'))
                        <li><a href="{{ route('hospitals.index') }}" class="block py-2 ml-3">Hospitals List</a></li>
                        @endif
                        @if (hasAnyPermissions('hospitals.create'))
                        <li><a href="{{ route('hospitals.create') }}" class="block py-2 ml-3">Add Hospital</a></li>
                        @endif
                    </ul>
                </div>

                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        Blog
                    </span>
                    <ul class="pl-8 bg-gray-100 text-sm subMenu hidden">
                        @if (hasAnyPermissions('categories.index'))
                        <li><a href="{{ route('categories.index') }}" class="block py-2 ml-3">Category List</a></li>
                        @endif
                        @if (hasAnyPermissions('categories.create'))
                        <li><a href="{{ route('categories.create') }}" class="block py-2 ml-3">Add Category</a></li>
                        @endif
                        @if (hasAnyPermissions('posts.index'))
                        <li><a href="{{ route('posts.index') }}" class="block py-2 ml-3">Posts</a></li>
                        @endif
                        @if (hasAnyPermissions('posts.create'))
                        <li><a href="{{ route('posts.create') }}" class="block py-2 ml-3">Add Post</a></li>
                        @endif
                    </ul>
                </div>
                <div
                    class="sub-btn px-2 py-2 text-sm leading-5 hover:bg-gray-100 font-medium text-gray-600 rounded-md focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                    <span class="pl-4">
                        <a href="{{ route('languages.index') }}" class="block py-2 ml-3">Language</a>
                    </span>
                </div>

                <div class="relative">
                    <li
                        class=" mt-1 group flex items-center justify-between px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-800 hover:bg-gray-100 focus:outline-none  transition ease-in-out duration-150">
                        <div class="flex items-center">
                            <svg cla xmlns="http://www.w3.org/2000/svg"
                                class="mr-3 h-6 w-6 text-gray-600 group-hover:text-gray-800  transition ease-in-out duration-150"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </div>

                    </li>
                    <div class="ml-5">
                        @if (hasAnyPermissions('role.list'))
                            <a href="{{ route('role.list') }}"
                                class=" mt-1 {{ isRouteActive('role*') }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-800 hover:bg-gray-100 focus:outline-none  transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                                </svg>
                                Role
                            </a>
                        @endif
                        @if (hasAnyPermissions('user.list'))
                            <a href="{{ route('user.list') }}"
                                class=" mt-1  {{ isRouteActive('user*') }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-white  transition ease-in-out duration-150">
                                <svg class="mr-3 h-6 w-6 text-gray-600 group-hover:text-gray-800  transition ease-in-out duration-150"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36"
                                    height="36">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"
                                        fill="currentColor" />
                                </svg>
                                User
                            </a>
                        @endif


                        @if (hasAnyPermissions('settings'))
                            <a href="{{ route('settings') }}"
                                class=" mt-1 {{ isRouteActive('settings*') }}   group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-800 hover:bg-gray-100 focus:outline-none  transition ease-in-out duration-150">
                                <svg class="mr-3 h-6 w-6 text-gray-600 group-hover:text-gray-800  transition ease-in-out duration-150"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M3.34 17a10.018 10.018 0 0 1-.978-2.326 3 3 0 0 0 .002-5.347A9.99 9.99 0 0 1 4.865 4.99a3 3 0 0 0 4.631-2.674 9.99 9.99 0 0 1 5.007.002 3 3 0 0 0 4.632 2.672c.579.59 1.093 1.261 1.525 2.01.433.749.757 1.53.978 2.326a3 3 0 0 0-.002 5.347 9.99 9.99 0 0 1-2.501 4.337 3 3 0 0 0-4.631 2.674 9.99 9.99 0 0 1-5.007-.002 3 3 0 0 0-4.632-2.672A10.018 10.018 0 0 1 3.34 17zm5.66.196a4.993 4.993 0 0 1 2.25 2.77c.499.047 1 .048 1.499.001A4.993 4.993 0 0 1 15 17.197a4.993 4.993 0 0 1 3.525-.565c.29-.408.54-.843.748-1.298A4.993 4.993 0 0 1 18 12c0-1.26.47-2.437 1.273-3.334a8.126 8.126 0 0 0-.75-1.298A4.993 4.993 0 0 1 15 6.804a4.993 4.993 0 0 1-2.25-2.77c-.499-.047-1-.048-1.499-.001A4.993 4.993 0 0 1 9 6.803a4.993 4.993 0 0 1-3.525.565 7.99 7.99 0 0 0-.748 1.298A4.993 4.993 0 0 1 6 12c0 1.26-.47 2.437-1.273 3.334a8.126 8.126 0 0 0 .75 1.298A4.993 4.993 0 0 1 9 17.196zM12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0-2a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>

                                Business Settings
                            </a>
                        @endif

                        @if (hasAnyPermissions('changePassword'))
                            <a href="{{ route('changePassword') }}"
                                class="mt-1 {{ isRouteActive('changePassword*') }} group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-600 rounded-md hover:text-gray-800 hover:bg-gray-100 focus:outline-none  transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="mr-3 h-6 w-6 text-gray-600 group-hover:text-gray-800  transition ease-in-out duration-150"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Change Password
                            </a>
                        @endif
                    </div>

                </div>
            </nav>
        </div>

        <div class="flex-shrink-0 flex bg-gray-100 p-4">
            <a href="{{ route('logout') }}" class="flex-shrink-0 w-full group block" title="logout">
                <div class="flex items-center space-x-2">
                    <div class="ml-3 ">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="22" height="22">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M6.265 3.807l1.147 1.639a8 8 0 1 0 9.176 0l1.147-1.639A9.988 9.988 0 0 1 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12a9.988 9.988 0 0 1 4.265-8.193zM11 12V2h2v10h-2z" />
                        </svg>

                    </div>
                    <div class="mb-1">
                        <p
                            class="text-lg leading-4 font-medium text-gray-600 group-hover:text-gray-800 transition ease-in-out duration-150">
                            Logout
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        $('.sub-btn').click(function() {
            $(this).toggleClass('bg-gray-100');
            $(this).children('.subMenu').toggleClass('hidden');
        });
    </script>
@endpush
