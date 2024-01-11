@extends('backend.layout.app')
@section('title', 'Create Donar')
@section('main')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-16 px-10 m-4">
        <form action="{{ route('donars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name<span
                        class="text-red-700">*</span></label>
                <input type="text" id="name" name="name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bn_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bangla Name</label>
                <input type="text" id="bn_name" name="bn_name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('bn_name') }}">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('email') }}">
            </div>
            <div class="mb-6">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number <span class="text-red-700">*</span></label>
                <input type="tel" id="phone" name="phone"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('phone') }}">
            </div>
            <div class="mb-6">
                <label for="last_donation_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Donation Date</label>
                <input type="text" id="last_donation_date" name="last_donation_date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                    value="{{ old('last_donation_date') }}">
            </div>
            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <textarea id="address" type="textarea" name="address" rows="2" minHeight="500"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
            </div>
            <div class="mb-6">
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
            <div class="mb-6">
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender<span
                        class="text-red-700">*</span></label>
                <select id="gender" name="gender"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected disabled> Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                 @error('gender')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status<span
                        class="text-red-700">*</span></label>
                <select id="status" name="status"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected disabled> Select</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                </select>
                 @error('status')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                @php
                    $blood_group = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
                @endphp
                <label for="blood_group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blood Group<span
                        class="text-red-700">*</span></label>
                <select id="blood_group" name="blood_group"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="" selected disabled> Select</option>
                    @foreach ($blood_group as $data)
                    <option value="{{ $data }}">{{ $data }}</option>
                    @endforeach
                </select>
                 @error('blood_group')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
            </button>
        </form>

    </div>
@endsection
@push('js')
    <script>
        $("#area").select2()
    </script>
@endpush
