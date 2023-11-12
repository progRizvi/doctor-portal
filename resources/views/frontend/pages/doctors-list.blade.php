@extends('frontend.layout')
@section('title', 'Doctors')
@section('content')

    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-10 col-10 text-center mx-auto">
                    <div class="search-box-one aos" data-aos="fade-up">
                        @include('frontend.pages.search')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class=" col-md-5 col-lg-4 col-xl-4">
                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0 bg-info px-4 py-3">Filter</h4>
                        </div>
                        <div class="card-body">

                            <div class="filter-widget">
                                <h4>Departments</h4>
                                @foreach ($departments as $department)
                                    <div class="py-2 cursor-pointer department" style="cursor:pointer"
                                        data-id="{{ $department->id }}">
                                        <span class="checkmark"></span> {{ $department->name }} <span
                                            class="badge bg-success">{{ $department->doctors->count() }}</span>
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->
                </div>
                <div class="col-md-12 col-lg-8 col-xl-8 mx-auto doctors">
                    <div class="breadcrumb-bar-two">
                        <div class="container">
                            <div class="row">
                                @foreach ($doctors as $doctor)
                                    <div class="col-xs-12">
                                        <a href="{{ route('service.doctor.details', $doctor->slug) }}">
                                            <div class="why-us-content">
                                                <div class="us-faq aos" data-aos="fade-up" data-aos-delay="200">
                                                    <div
                                                        style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                                        <div class="accordion-collapse shade collapse show bg-white"
                                                            style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                                            <div class="d-flex">
                                                                <img style="border-top-left-radius:20px;border-bottom-left-radius:20px;"
                                                                    class="img-fluid w-25"
                                                                    @if ($doctor->image) src="{{ asset('public/uploads/doctors/' . $doctor->image) }}"
                                                            @else
                                                            src="{{ asset('images/' . $doctor->gender . '_avatar.jpg') }}" @endif
                                                                    alt="{{ $doctor->name }}">
                                                                <div class="px-3 pt-2">
                                                                    <h4 style="color:#09DCA4">{{ $doctor->name }}</h4>
                                                                    <p>
                                                                        @foreach ($doctor->departments as $department)
                                                                            @if ($loop->last)
                                                                                {{ $department->name }}
                                                                            @else
                                                                                {{ $department->name }} ,
                                                                            @endif
                                                                        @endforeach ,
                                                                        {{ $doctor->area->name }},
                                                                        {{ $doctor->area->district->name }}
                                                                    </p>
                                                                    <hr style="color:gray" />
                                                                    <p>
                                                                        {{ $doctor->bio }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        {!! $doctors->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".department").click(function() {
                var department = $(this).data("id");
                $.ajax({
                    url: "{{ route('get.doctors.by.department', '') }}/" + department,
                    type: "GET",
                    data: {
                        department: department
                    },
                    success: function(data) {
                        $(".doctors").html(data);
                    }
                });

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');
                $.ajax({
                    url: myurl,
                    type: "GET",
                    success: function(data) {
                        $(".doctors").html(data);
                    }
                });

            });
        });
    </script>
@endpush
