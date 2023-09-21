@foreach($articles as $article)
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                @if($article->featured_image->count() !== 0)
                    <a href="{{ route('customers.blogs.show', ['slug' => $article->slug ]) }}">
                        <img
                            class="img-fluid card-img-top"
                            src="{{$article->featured_image->first()->getUrl()}}"
                            alt="img-placeholder"
                        />
                    </a>
                @else
                    <a href="{{ route('customers.blogs.show', ['slug' => $article->slug ]) }}">
                        <img
                            class="img-fluid card-img-top"
                            src="{{ asset('assets/img/front-pages/misc/2.jpg') }}"
                            alt="img-placeholder"
                        />
                    </a>
                @endif

                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('customers.blogs.show', ['slug' => $article->slug ]) }}"
                           class="blog-title-truncate text-body-heading"
                        >{{ $article->title }}</a
                        >
                    </h4>
                    <div class="d-flex">
                        <div class="author-info">
                            <small class="text-muted me-25">In</small>
                            <small><a href="javascript:void(0);"
                                      class="text-body">{{ $article->categories->first() ? $article->categories->first()->name : '' }}</a></small>
                            <span class="text-muted ms-50 me-25">|</span>
                            <small
                                class="text-muted">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $article->created_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="my-1 py-25">
                        @foreach($article->categories as $category)
                            <a href="javascript:void(0);">
                                <span class="badge rounded-pill bg-label-primary me-50">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>
                    <p class="card-text blog-content-truncate">
                        {!! $article->page_text !!}
                    </p>
                    <hr/>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('customers.blogs.show', ['slug' => $article->slug ]) }}" class="fw-bold">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
