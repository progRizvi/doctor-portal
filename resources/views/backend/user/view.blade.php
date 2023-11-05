@extends('backend.layout.app')
@section('title')
User Profile
@endsection
@section('main')


<div class="bg-white rounded-lg shadow-md mt-10 mb-10 pb-7 mx-10">

    <div class="flex justify-between items-center px-8 py-5 border-b-2 border-gray-200">
        <div class="flex justify-start items-center">
            <img src="{{$user->image}}"
                class="block border-4 border-white h-36 mt-10 object-cover rounded-full w-36" alt="" />
            <div class="pl-5">
                <h3 class="text-3xl font-medium text-gray-700">Profile</h3>
                <p class="text-md text-gray-500"> Account Information</p>
            </div>
        </div>
    </div>

    <div x-data="{ tab: '#tab1' }" x-init="$refs[tab].focus()" class="pl-8">

        <!-- Links here -->
        <div class="flex flex-row justify-start mx-4 ">
            <div>
                <div class="space-x-10 py-4">
                    <a x-ref="#tab1"
                        class="px-4 py-2 text-xl font-bold  outline-none border-b-2 hover:border-green-400 focus:border-green-500 active:border-indigo-500 visited:border-indigo-500"
                        href="#" x-on:click.prevent="tab = '#tab1'">General Information</a>

                    <a x-ref="#tab2"
                        class="px-4 py-2 text-xl font-bold border-b-2 outline-none hover:border-green-400 focus:border-green-500 active:border-indigo-500 visited:border-indigo-500"
                        href="#" x-on:click.prevent="tab = '#tab2'">Extra Information</a>


                </div>
            </div>
        </div>

        <!-- Tab Content here -->
        <div class="flex flex-row justify-start mx-4 space-x-4">
            <div>
                <div x-show="tab == '#tab1'" x-cloak>
                    <div class="py-5 ">



                        <div class="pl-20 space-y-8">
                            <div class="grid grid-cols-2 gap-20">
                                <div>
                                    <p class="font-medium text-lg">Name</p>
                                    <p class="font-normal text-sm">{{$user->name }}</p>
                                </div>

                                <div>
                                    <p class="font-medium text-lg">Gender</p>
                                    <p class="font-normal text-sm">default</p>
                                </div>
                            </div>


                            <div class="grid grid-cols-2 gap-20">
                                <div>
                                    <p class="font-medium text-lg">Email</p>
                                    <p class="font-normal text-sm">{{$user->email }}</p>
                                </div>

                                <div>
                                    <p class="font-medium text-lg">Address</p>
                                    <p class="font-normal text-sm">default</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-20">
                                <div>
                                    <p class="font-medium text-lg">Phone</p>
                                    <p class="font-normal text-sm">{{$user->phone }}</p>
                                </div>

                                <div>
                                    <p class="font-medium text-lg">Date of birth</p>
                                    <p class="font-normal text-sm">default</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab == '#tab2'" x-cloak>
                    <div class="py-5">


                        <div class="pl-20 space-y-8">


                            <div class="grid grid-cols-2 gap-20">
                              <div >
                                   <p class="font-medium text-base">Available status</p>
                                   <p class="font-normal text-sm">default</p>
                               </div>

                               <div>
                                   <p class="font-medium text-base">Available date</p>
                                   <p class="font-normal text-sm">{{$user->created_at->format('Y-m-d')}}</p>
                               </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection
