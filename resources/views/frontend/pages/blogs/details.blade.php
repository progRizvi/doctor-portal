@extends('frontend.layout')
@section('title', $post->title)
@section('meta_keywords', $post->meta_keywords)
@section('meta_description', $post->meta_description)
@section('author', $post->author->name)
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{ $post->title }}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('website.home') }}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ __('website.blog_details') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-view">
                        <div class="blog blog-single-post">
                            <div class="blog-image">
                                <a href="javascript:void(0);"><img alt="{{ $post->title }}"
                                        src="{{ asset('public/uploads/thumbnail/' . $post->thumbnail) }}"
                                        class="img-fluid"></a>
                            </div>
                            <h3 class="blog-title">{{ $post->title }}</h3>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li>
                                            <div class="post-author">
                                                <span>{{ $post->author->name }}</span>
                                            </div>
                                        </li>
                                        <li><i
                                                class="far fa-calendar"></i>{{ \Carbon\Carbon::parse($post->posted_at)->format('d M Y') }}
                                        </li>
                                        <li><i class="fa fa-tags"></i>{{ $post->category->name }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-content">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                </div>

                @include('frontend.pages.blogs.sidebar', [
                    'categories' => $categories,
                    'latestPosts' => $latestPosts,
                ])

            </div>
        </div>

    </div>

    <script type="application/ld+json">
        {
        "@context": "{{ url('/') }}",
        "@type": "BlogPosting",
        "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ url()->current() }}"
  },
        "headline": "{{ $post->title }}",
          "description": "{!! $post->content !!}",
        "image": "{{ url('/uploads/thumbnail', $post->thumbnail) }}",
        "author": {
            "@type": "Person",
            "name": "{{ $post->author->name }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "",
            "logo": {
            "@type": "ImageObject",
            "url": ""
            }
        },
        "datePublished": "{{ now()->parse($post->posted_at)->format('d F Y') }}",
          "dateModified": "{{ now()->parse($post->updated_at)->format('d F Y') }}",
        }
</script>
@endsection
