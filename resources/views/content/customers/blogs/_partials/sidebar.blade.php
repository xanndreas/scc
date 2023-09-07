<div class="blog-sidebar my-2 my-lg-0">
    <!-- Search bar -->
    <div class="blog-search">
        <div class="input-group input-group-merge">
            <input type="text" class="form-control" placeholder="Search here" />
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
            <div class="d-flex mb-2">
                <a href="{{asset('page/blog/detail')}}" class="me-2">
                    <img
                        class="rounded"
                        src="{{asset('assets/img/front-pages/misc/2.jpg')}}"
                        width="100"
                        height="70"
                        alt="Recent Post Pic"
                    />
                </a>
                <div class="blog-info">
                    <h6 class="blog-recent-post-title">
                        <a href="{{asset('page/blog/detail')}}" class="text-body-heading">Why Should Forget Facebook?</a>
                    </h6>
                    <div class="text-muted mb-0">Jan 14 2020</div>
                </div>
            </div>

        </div>
    </div>
    <!--/ Recent Posts -->

    <!-- Categories -->
    <div class="blog-categories mt-3">
        <h6 class="section-label">Categories</h6>
        <div class="mt-1">
            <div class="d-flex justify-content-start align-items-center mb-75">
                <a href="#">
                    <div class="blog-category-title text-body">Food</div>
                </a>
            </div>
        </div>
    </div>
    <!--/ Categories -->
</div>
