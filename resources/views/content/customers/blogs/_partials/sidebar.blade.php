<div class="blog-sidebar my-2 my-lg-0">

    <!-- Recent Posts -->
    <div class="blog-recent-posts mt-3">
        @if ($recentArticles->count() != 0)
            <h6 class="section-label">Recent Posts</h6>
            <div class="mt-75">
                @foreach ($recentArticles as $article)
                    <div class="d-flex mb-2">
                        @if ($article->featured_image->count() !== 0)
                            <a href="{{ route('customers.blogs.show', ['slug' => $article->slug]) }}" class="me-2">
                                <img class="rounded" width="100" height="70"
                                    src="{{ $article->featured_image->first()->getUrl() }}" alt="img-placeholder" />
                            </a>
                        @else
                            <a href="{{ route('customers.blogs.show', ['slug' => $article->slug]) }}" class="me-2">
                                <img class="rounded" width="100" height="70"
                                    src="{{ asset('assets/img/front-pages/misc/2.jpg') }}" alt="img-placeholder" />
                            </a>
                        @endif

                        <div class="blog-info">
                            <h6 class="blog-recent-post-title">
                                <a href="{{ asset('page/blog/detail') }}" class="text-body-heading">
                                    {{ $article->title }}</a>
                            </h6>
                            <div class="text-muted mb-0">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!--/ Recent Posts -->

    <!-- Categories -->
    <div class="blog-categories mt-3">
        @if ($categories->count() != 0)
            <h6 class="section-label">Categories</h6>
            <div class="mt-1">
                @foreach ($categories as $category)
                    <div class="d-flex justify-content-start align-items-center mb-75">
                        <a href="{{ route('customers.blogs.index', ['categories' => $category->slug]) }}">
                            <div class="blog-category-title text-body">{{ $category->name }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!--/ Categories -->
</div>
