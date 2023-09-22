<div class="blog-sidebar my-2 my-lg-0">
    <!-- Search bar -->
    <div class="blog-search">
        <div class="input-group input-group-merge">
            <input type="text" class="form-control" placeholder="Search here"/>
            <span class="input-group-text cursor-pointer">
        <i data-feather="search"></i>
      </span>
        </div>
    </div>
    <!--/ Search bar -->

    <!-- Recent Posts -->
    <div class="blog-recent-posts mt-3">
        <h6 class="section-label">Recent Posts</h6>
        <div class="mt-75">
            @foreach($recentArticles as $article)
                <div class="d-flex mb-2">
                    @if($article->featured_image->count() !== 0)
                        <a href="{{ route('customers.blogs.show', ['slug' => $article->slug ]) }}" class="me-2">
                            <img
                                class="rounded" width="100" height="70"
                                src="{{$article->featured_image->first()->getUrl()}}"
                                alt="img-placeholder"
                            />
                        </a>
                    @else
                        <a href="{{ route('customers.blogs.show', ['slug' => $article->slug ]) }}" class="me-2">
                            <img
                                class="rounded" width="100" height="70"
                                src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                                alt="img-placeholder"
                            />
                        </a>
                    @endif

                    <div class="blog-info">
                        <h6 class="blog-recent-post-title">
                            <a href="{{asset('page/blog/detail')}}" class="text-body-heading"> {{ $article->title }}</a>
                        </h6>
                        <div
                            class="text-muted mb-0">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->diffForHumans() }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--/ Recent Posts -->

    <!-- Categories -->
    <div class="blog-categories mt-3">
        <h6 class="section-label">Categories</h6>
        <div class="mt-1">
            @foreach($categories as $category)
                <div class="d-flex justify-content-start align-items-center mb-75">
                    <a href="javascript:void(0);">
                        <div class="blog-category-title text-body">{{ $category->name }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!--/ Categories -->
</div>
