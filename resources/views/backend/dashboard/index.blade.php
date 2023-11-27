@extends('backend.layout.app')
@section('title')
    Dashboard
@endsection
@section('main')
    <div class="flex items-center justify-center">
        <div class="p-4 rounded w-full">
            <div class="md:grid md:grid-cols-3 md:gap-4 lg:grid-cols-3 space-y-4 md:space-y-0 mt-4 lg:gap-8">
                <a href="{{ route('doctors.index') }}">
                    <div class="shadow-md bg-white rounded-lg h-36">
                        <div class="flex items-center justify-between  p-8">

                            <div class="space-y-4">
                                <p class="text-gray-500 text-xl font-semibold">Total Doctors</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        {{ $data['total_doctors'] }}
                                    </h2>
                                </div>
                            </div>
                            <div class="p-4 bg-purple-600 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                                </svg>

                            </div>
                        </div>

                    </div>
                </a>
                <a href="{{ route('hospitals.index') }}">
                    <div class="shadow-md bg-white rounded-lg h-36">
                        <div class="flex items-center justify-between  p-8">
                            <div class="space-y-4">
                                <p class="text-gray-500 text-xl font-semibold">Total Hospital</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        {{ $data['total_hospitals'] }}
                                    </h2>

                                </div>
                            </div>
                            <div class="p-4 bg-green-600 text-white rounded-full">
                                <svg class="fill-current w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M21 21h-8V6a3 3 0 0 1 3-3h5a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1zm-10 0H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a3 3 0 0 1 3 3v15zm0 0h2v2h-2v-2z" />
                                </svg>{{-- <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-7 h-7" width="24" height="24" viewBox="0 0 24 24"><path d="M17.997 18h-11.995l-.002-.623c0-1.259.1-1.986 1.588-2.33 1.684-.389 3.344-.736 2.545-2.209-2.366-4.363-.674-6.838 1.866-6.838 2.491 0 4.226 2.383 1.866 6.839-.775 1.464.826 1.812 2.545 2.209 1.49.344 1.589 1.072 1.589 2.333l-.002.619zm4.811-2.214c-1.29-.298-2.49-.559-1.909-1.657 1.769-3.342.469-5.129-1.4-5.129-1.265 0-2.248.817-2.248 2.324 0 3.903 2.268 1.77 2.246 6.676h4.501l.002-.463c0-.946-.074-1.493-1.192-1.751zm-22.806 2.214h4.501c-.021-4.906 2.246-2.772 2.246-6.676 0-1.507-.983-2.324-2.248-2.324-1.869 0-3.169 1.787-1.399 5.129.581 1.099-.619 1.359-1.909 1.657-1.119.258-1.193.805-1.193 1.751l.002.463z"/></svg> --}}
                            </div>
                        </div>

                    </div>
                </a>
                {{--
                <a href="">
                    <div class="shadow-md bg-white rounded-lg h-36">
                        <div class="flex items-center justify-between  p-6">

                            <div class="space-y-4">
                                <p class="text-gray-500 text-xl font-semibold">Total Opportunities</p>
                                <div class="flex items-baseline space-x-4">
                                    <h2 class="text-2xl font-semibold">
                                        0
                                    </h2>

                                </div>
                            </div>
                            <div class="p-4 bg-yellow-600 text-white rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </a>
                 --}}
            </div>
        </div>


    </div>
    <!--
                    <div class="shadow-lg rounded-lg overflow-hidden bg-white mx-4 my-4 w-[50%]">

                      <canvas class="p-10" id="chartPie"></canvas>
                    </div> -->
    {{--   <div class="shadow-lg rounded-lg overflow-hidden bg-white mx-4  my-4"> --}}

    {{--  <canvas class="p-10 h-full" id="chartBar"></canvas> --}}
    {{-- </div> --}}




    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart bar -->
    <script>
        const labelsBarChart = {!! json_encode(5) !!};


        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "Opportunity chart",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: {!! json_encode(5) !!},

            }, ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {},
        };

        var chartBar = new Chart(
            document.getElementById("chartBar"),
            configBarChart
        );
    </script>

    <!-- bar chart -->
    <script>
        const dataPie = {
            labels: ["JavaScript", "Python", "Ruby"],
            datasets: [{
                label: "My First Dataset",
                data: [300, 50, 100],
                backgroundColor: [
                    "rgb(133, 105, 241)",
                    "rgb(164, 101, 241)",
                    "rgb(101, 143, 241)",
                ],
                hoverOffset: 4,
            }, ],
        };

        const configPie = {
            type: "pie",
            data: dataPie,
            options: {},
        };

        var chartBar = new Chart(document.getElementById("chartPie"), configPie);
    </script>
@endsection
