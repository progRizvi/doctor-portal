@extends('frontend.layout')

@if(isset($extraData) && $extraData->meta_title)
    @section('title', $extraData->meta_title)
@else
    @section('title', __('website.surgery_support'))
@endif
@if (isset($extraData))
    @section('meta_keywords', $extraData->meta_keywords)
    @section('meta_description', $extraData->meta_description)
@endif
@section('content')

    <style>
        .support-heading {
            font-size: 20px;
            font-weight: 600;
            color: #000;
            text-align: center;
        }
    </style>

    @php
        $loc = session('loc');
    @endphp

    <div class="content" style="padding-top: 120px">
        <div class="container">
            <div class="row">
                <div class="col-sm-11 mx-auto">
                    <h3>
                        {{ __('website.we_are_experts_in_surgical_solution') }}
                    </h3>
                    @if (isset($extraData))
                        <h4 class="my-5">
                            {{ $loc == 'en' ? $extraData?->title : (isset($extraData?->bn_title) ? $extraData?->bn_title : $extraData?->title) }}
                        </h4>
                    @endif
                </div>
                <div class="col-sm-11 mx-auto">
                    <div class="breadcrumb-bar-two">
                        <div class="row mx-2">
                            @foreach ($surgerySupports as $data)
                                <div class="col-xs-12 col-md-3">
                                    <div class="why-us-content">
                                        <div class="us-faq aos" data-aos="fade-up" data-aos-delay="200">
                                            <div style="margin:5px 0px 15px 0px;border:0px solid rgba(0, 0, 0, 0.125);">
                                                <div class="accordion-collapse shade collapse show bg-white"
                                                    style="box-shadow:-8px 13px 80px rgba(27, 41, 80, 0.3); border-radius:20px">
                                                    <div class="d-flex justify-content-center">
                                                        <h4 class="py-3 support-heading" style="cursor:pointer">
                                                            <a href="{{ route('surgery-support.show', $data->slug) }}">
                                                                {{ $loc == 'en' ? $data->title : (isset($data->bn_title) ? $data->bn_title : $data->title) }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="d-flex justify-content-center pb-3">
                                                        <div class="form-search-btn">
                                                            <a class="btn call-now-button"
                                                                href="tel:{{ $data->phone }}">{{ __('website.call_now') }}</a>
                                                            <div class="mt-1">
                                                                <span>{{ $data->phone }}</span>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-11 mx-auto pt-5">
                    @if (isset($extraData))
                        {!! $loc == 'en'
                            ? $extraData?->description
                            : (isset($extraData?->bn_description)
                                ? $extraData?->bn_description
                                : $extraData?->description) !!}
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

