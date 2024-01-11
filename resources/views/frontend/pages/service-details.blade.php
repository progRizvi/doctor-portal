@extends('frontend.layout')
@section('title', $data->title)

@section('meta_keywords', $data->meta_keywords)
@section('meta_description', $data->meta_description)

@section('content')
    <div class="row">
        <div class="col-6 mx-auto mt-5" style="margin-top: 125px!important;">
            <div class="card border-0 p-4" style=" box-shadow:0px 0px 5px rgba(0,0,0,.1)">
                <div class="image">
                    <img src="{{ $data->image }}" alt="" class="img-fluid">
                </div>
                <div class="card-inner">
                    <div class="header">
                        <h3>{{ $data->title }}</h3>
                    </div>
                    <div class="content">
                        <p>
                            {!! $data->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
