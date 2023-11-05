<style>
    .active>.page-link {
        color: #fff !important;
    }
</style>

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row">
            @foreach ($doctors as $doctor)
                <div class="col-xs-12">
                    <a href="{{ route('service.doctor.details', $doctor->slug) }}">
                        <div class="why-us-content">
                            <div class="us-faq">
                                <div style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                    <div class="accordion-collapse shade collapse show bg-white"
                                        style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                        <div class="d-flex">
                                            <img style="border-top-left-radius:20px;border-bottom-left-radius:20px;"
                                                class="img-fluid w-25"
                                                src="{{ asset('/images/' . $doctor->gender . '_avatar.jpg') }}"
                                                alt="">
                                            <div class="px-3 pt-2">
                                                <h4 style="color:#09DCA4">{{ $doctor->name }}</h4>
                                                <p>
                                                    {{ $doctor->department->name }} ,
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
<div class="mt-4 ms-auto">
    {!! $doctors->links() !!}
</div>
