@extends('frontend.layout')
@section('title', 'Blog')
@if (isset($category))
    @section('meta_description', $category->meta_description)
@section('meta_keywords', $category->meta_keywords)
@endif

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{ __('website.blog') }} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('website.home') }} </a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ __('website.blog') }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if ($posts->count() > 0)
                        <!-- Blog Post -->
                    @foreach ($posts as $post)
                        <div class="blog">
                            <div class="blog-image">
                                <a href="{{ route('post.details', $post->slug) }}"><img class="img-fluid"
                                        src="{{ asset('public/uploads/thumbnail/' . $post->thumbnail) }}"
                                        alt="{{ $post->title }}"></a>
                            </div>
                            <h3 class="blog-title"><a href="{{ route('post.details', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li>
                                            <div class="post-author">
                                                <span>{{ $post->author->name }}</span>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock">
                                            </i>{{ \Carbon\Carbon::parse($post->posted_at)->format('d M Y') }} </li>
                                        <li><i class="fa fa-tags"></i>{{ $post->category->name }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-content">
                                <p>{!! Str::limit($post->content, 200) !!}</p>
                                <a href="{{ route('post.details', $post->slug) }}" class="read-more">{{ __('website.view_blog') }}</a>
                            </div>
                        </div>
                    @endforeach
                    <!-- /Blog Post -->

                    <!-- Blog Pagination -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-pagination">
                                {{ $posts->links('pagination::bootstrap-custom') }}
                            </div>
                        </div>
                    </div>
                    <!-- /Blog Pagination -->

                    @else
                        @include('frontend.pages.no-data-found')
                    @endif
                    
                </div>

                <!-- Blog Sidebar -->
                @include('frontend.pages.blogs.sidebar', [
                    'categories' => $categories,
                    'latestPosts' => $latestPosts,
                ])
                <!-- /Blog Sidebar -->
            </div>
        </div>
    </div>
@endsection
