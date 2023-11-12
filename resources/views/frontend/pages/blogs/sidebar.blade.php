<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

    <!-- Search -->
    <div class="card search-widget">
        <div class="card-body">
            <form class="search-form" action={{ route('blogs') }}>
                <div class="input-group">
                    <input type="text" placeholder="Search..." class="form-control" name="search">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /Search -->

    <!-- Latest Posts -->
    <div class="card post-widget">
        <div class="card-header">
            <h4 class="card-title">Latest Posts</h4>
        </div>
        <div class="card-body">
            <ul class="latest-posts">
                @foreach ($latestPosts as $post)
                    <li>
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img class="img-fluid" src="{{ asset('public/uploads/thumbnail/' . $post->thumbnail) }}"
                                    alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="post-info">
                            <h4>
                                <a href="{{ route('post.details', $post->slug) }}">{{ $post->title }}</a>
                            </h4>
                            <p>{{ \Carbon\Carbon::parse($post->posted_at)->format('d M Y') }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /Latest Posts -->

    <!-- Categories -->
    <div class="card category-widget">
        <div class="card-header">
            <h4 class="card-title">Blog Categories</h4>
        </div>
        <div class="card-body">
            <ul class="categories">
                @foreach ($categories as $category)
                    <li><a href="{{ route('category.details', $category->slug) }}">{{ $category->name }}
                            <span>({{ $category->posts->count() }})</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /Categories -->

    <!-- Tags -->
    {{--
                <div class="card tags-widget">
                    <div class="card-header">
                        <h4 class="card-title">Tags</h4>
                    </div>
                    <div class="card-body">
                        <ul class="tags">
                            <li><a href="#" class="tag">Children</a></li>
                            <li><a href="#" class="tag">Disease</a></li>
                            <li><a href="#" class="tag">Appointment</a></li>
                            <li><a href="#" class="tag">Booking</a></li>
                            <li><a href="#" class="tag">Kids</a></li>
                            <li><a href="#" class="tag">Health</a></li>
                            <li><a href="#" class="tag">Family</a></li>
                            <li><a href="#" class="tag">Tips</a></li>
                            <li><a href="#" class="tag">Shedule</a></li>
                            <li><a href="#" class="tag">Treatment</a></li>
                            <li><a href="#" class="tag">Dr</a></li>
                            <li><a href="#" class="tag">Clinic</a></li>
                            <li><a href="#" class="tag">Online</a></li>
                            <li><a href="#" class="tag">Health Care</a></li>
                            <li><a href="#" class="tag">Consulting</a></li>
                            <li><a href="#" class="tag">Doctors</a></li>
                            <li><a href="#" class="tag">Neurology</a></li>
                            <li><a href="#" class="tag">Dentists</a></li>
                            <li><a href="#" class="tag">Specialist</a></li>
                            <li><a href="#" class="tag">Doccure</a></li>
                        </ul>
                    </div>
                </div>
                 --}}
    <!-- /Tags -->

</div>
