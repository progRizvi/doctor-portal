<style>
    .active>.page-link {
        color: #fff !important;
    }
</style>

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row">
            @foreach ($hospitals as $hospital)
                <div class="col-xs-12">
                    <a href="{{ route('service.hospital.details', $hospital->slug) }}">
                        <div class="why-us-content">
                            <div class="us-faq aos">
                                <div style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                    <div class="accordion-collapse shade collapse show bg-white"
                                        style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                        <div class="d-flex">
                                            <img style="border-top-left-radius:20px;border-bottom-left-radius:20px;"
                                                class="img-fluid w-25"
                                                @if ($hospital->image) src="{{ asset('uploads/hospitals/' . $hospital->image) }}"
                                                            @else
                                                            src="{{ asset('images/hospital.svg') }}" @endif
                                                alt="{{ $hospital->name }}">
                                            <div class="px-3 pt-2">
                                                <h4 style="color:#09DCA4">{{ $hospital->name }}</h4>
                                                <p>
                                                    Address: {{ $hospital->address }},
                                                    {{ $hospital->area->name }},
                                                    {{ $hospital->area->district->name }},
                                                    {{ $hospital->area->district->division->name }}
                                                </p>
                                                <hr style="color:gray" />
                                                <p>
                                                    {{ $hospital->bio }}
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
    {!! $hospitals->links() !!}
</div>
