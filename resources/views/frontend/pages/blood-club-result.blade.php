<style>
    .active>.page-link {
        color: #fff !important;
    }

    a:hover {
        color: #0E82FD;
    }

    a.active {
        color: #0E82FD;
    }

    .doctor-image {
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        /* margin: auto; */
    }

    @media (max-width: 767px) {
        .doctor-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            margin: auto 0;
        }
    }
</style>
@php
    $loc = session('loc');
@endphp
<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row">
            <div class="col-sx-12 ">
                <div class="bg-white py-3 px-3 mx-2 doctor-list" style="color:#0E82FD">
                    <div class="d-flex justify-content-between">
                        <p>{{ isset($group) ? $group : 'All Donars' }}
                            {{ isset($group) ? (str_contains($group, '+') ? 'Positive' : 'Negative') : '' }}</p>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#donateModal">Donate
                            Blood</button>
                    </div>
                    <p>
                        <hr>
                    </p>
                </div>
            </div>
            @foreach ($donars as $donar)
                <div class="col-xs-12">
                    <div class="why-us-content">
                        <div class="us-faq">
                            <div style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                <div class="accordion-collapse shade collapse show bg-white"
                                    style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.1); border-radius:20px">
                                    <div class="d-flex">
                                        <img class="img-fluid w-25 doctor-image"
                                            src="{{ asset('images/' . $donar->gender . '_avatar.jpg') }}"
                                            alt="{{ $donar->name }}">
                                        <div class="px-3 pt-2">
                                            <h4 class="text-info">
                                                {{ $loc == 'en' ? $donar->name : (isset($donar->bn_name) ? $donar->bn_name : $donar->name) }}
                                            </h4>
                                            <p>
                                                {{ $donar->address }},
                                                {{ $loc == 'en' ? $donar->area?->name : (isset($donar->area?->bn_name) ? $donar->area?->bn_name : $donar->area?->name) }},
                                                {{ $loc == 'en' ? $donar->area?->district?->name : (isset($donar->area?->district?->bn_name) ? $donar->area?->district?->bn_name : $donar->area?->district?->name) }}
                                            </p>
                                            <hr style="color:gray" />
                                            <p>
                                                <span class="text-info">
                                                    {{ __('website.blood_group') }}:
                                                </span>
                                                {{ $donar->blood_group }}
                                            </p>
                                            <p>
                                                @php
                                                    $phone = preg_replace('/[^0-9]/', '', $donar->phone);
                                                    $phone = str_split($phone, 5)[0];

                                                @endphp
                                                <i class="fas fa-phone"></i> {{ $phone }}######
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            @if ($donars->count() == 0)
                <div class="col-12">
                    <div class="mx-2 mt-2">
                        @include('frontend.pages.no-data-found')
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="col-md-12 text-center mt-3">
    {!! $donars->links() !!}
</div>
