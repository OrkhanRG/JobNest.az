@extends("layouts.front")
@section("title", "Məqalələr")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Məqalələr",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "Məqalələr",
                "url" => route("front.blogs")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <!--Block one-->
                    <div class="blog-post twm-blog-post-1-outer twm-blog-list-style">
                        <div class="wt-post-media">
                            <a href="{{ route("front.blog", "test") }}"><img src="{{ asset("/assets/images/blog/latest/bg1.jpg") }}" alt=""></a>
                        </div>
                        <div class="wt-post-info">
                            <div class="wt-post-meta ">
                                <ul>
                                    <li class="post-date">March 05, 2023</li>
                                    <li class="post-author">By <a href="candidate-detail.html">Mark Petter</a></li>
                                </ul>
                            </div>
                            <div class="wt-post-title ">
                                <h4 class="post-title">
                                    <a href="{{ route("front.blog", "test") }}">How to convince recruiters and get your dream job</a>
                                </h4>
                            </div>
                            <div class="wt-post-text ">
                                <p>
                                    New chip traps clusters of migrating tumor cells asperiortenetur, blanditiis odit.
                                </p>
                            </div>
                            <div class="wt-post-readmore ">
                                <a href="{{ route("front.blog", "test") }}" class="site-button-link site-text-primary">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!--Block two-->
                    <div class="blog-post twm-blog-post-1-outer twm-blog-list-style">
                        <div class="wt-post-media">
                            <a href="blog-single.html"><img src="{{ asset("assets/images/blog/latest/bg2.jpg") }}" alt=""></a>
                        </div>
                        <div class="wt-post-info">
                            <div class="wt-post-meta ">
                                <ul>
                                    <li class="post-date">March 05, 2023</li>
                                    <li class="post-author">By <a href="candidate-detail.html">David Wish</a></li>
                                </ul>
                            </div>
                            <div class="wt-post-title ">
                                <h4 class="post-title">
                                    <a href="blog-single.html">5 things to know about the March
                                        2023 jobs report</a>
                                </h4>
                            </div>
                            <div class="wt-post-text ">
                                <p>
                                    New chip traps clusters of migrating tumor cells asperiortenetur, blanditiis odit.
                                </p>
                            </div>
                            <div class="wt-post-readmore ">
                                <a href="blog-single.html" class="site-button-link site-text-primary">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!--Block three-->
                    <div class="blog-post twm-blog-post-1-outer twm-blog-list-style">
                        <div class="wt-post-media">
                            <a href="blog-single.html"><img src="{{ asset("assets/images/blog/latest/bg3.jpg") }}" alt=""></a>
                        </div>
                        <div class="wt-post-info">
                            <div class="wt-post-meta ">
                                <ul>
                                    <li class="post-date">March 05, 2023</li>
                                    <li class="post-author">By <a href="candidate-detail.html">Mike Doe</a></li>
                                </ul>
                            </div>
                            <div class="wt-post-title ">
                                <h4 class="post-title">
                                    <a href="blog-single.html">Job Board is the most important
                                        sector in the world</a>
                                </h4>
                            </div>
                            <div class="wt-post-text ">
                                <p>
                                    New chip traps clusters of migrating tumor cells asperiortenetur, blanditiis odit.
                                </p>
                            </div>
                            <div class="wt-post-readmore ">
                                <a href="blog-single.html" class="site-button-link site-text-primary">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!--Block Four-->
                    <div class="blog-post twm-blog-post-1-outer twm-blog-list-style">
                        <div class="wt-post-media">
                            <a href="blog-single.html"><img src="{{ asset("assets/images/blog/latest/bg4.jpg") }}" alt=""></a>
                        </div>
                        <div class="wt-post-info">
                            <div class="wt-post-meta ">
                                <ul>
                                    <li class="post-date">March 05, 2023</li>
                                    <li class="post-author">By <a href="candidate-detail.html">Mark Petter</a></li>
                                </ul>
                            </div>
                            <div class="wt-post-title ">
                                <h4 class="post-title">
                                    <a href="blog-single.html">How to convince recruiters and get your dream job</a>
                                </h4>
                            </div>
                            <div class="wt-post-text ">
                                <p>
                                    New chip traps clusters of migrating tumor cells asperiortenetur, blanditiis odit.
                                </p>
                            </div>
                            <div class="wt-post-readmore ">
                                <a href="blog-single.html" class="site-button-link site-text-primary">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="pagination-outer">
                        <div class="pagination-style1">
                            <ul class="clearfix">
                                <li class="prev"><a href="javascript:;"><span> <i class="fa fa-angle-left"></i> </span></a></li>
                                <li><a href="javascript:;">1</a></li>
                                <li class="active"><a href="javascript:;">2</a></li>
                                <li><a href="javascript:;">3</a></li>
                                <li><a class="javascript:;" href="javascript:;"><i class="fa fa-ellipsis-h"></i></a></li>
                                <li><a href="javascript:;">5</a></li>
                                <li class="next"><a href="javascript:;"><span> <i class="fa fa-angle-right"></i> </span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-12 rightSidebar">

                    <div class="side-bar">
                        <div class="widget search-bx">

                            <form role="search" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button class="btn" type="button" id="button-addon2"><i class="feather-search"></i></button>
                                </div>
                            </form>

                        </div>

                        <div class="widget all_services_list">
                            <h4 class="section-head-small mb-4">Categories</h4>
                            <div class="all_services m-b30">
                                <ul>
                                    <li><a href="job-detail.html">Categories</a> <span class="badge">08</span></li>
                                    <li><a href="job-detail.html">Education</a> <span class="badge">12</span></li>
                                    <li><a href="job-detail.html">Information</a><span class="badge">15</span></li>
                                    <li><a href="job-detail.html">Jobs</a><span class="badge">25</span></li>
                                    <li><a href="job-detail.html">Learn</a><span class="badge">36</span></li>
                                    <li><a href="job-detail.html">Skill</a><span class="badge">12</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget recent-posts-entry">
                            <h4 class="section-head-small mb-4">Recent Article</h4>
                            <div class="section-content">
                                <div class="widget-post-bx">

                                    <div class="widget-post clearfix">
                                        <div class="wt-post-media">
                                            <img src="{{ asset("assets/images/blog/recent-blog/pic1.jpg") }}" alt="">
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-header">
                                                <span class="post-date">April 08, 2023</span>
                                                <span class="post-title">
                                                    <a href="blog-single.html">Equipment you can count on. People you can trust.</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="wt-post-media">
                                            <img src="{{ asset("assets/images/blog/recent-blog/pic2.jpg") }}" alt="">
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-header">
                                                <span class="post-date">April 12, 2023</span>
                                                <span class="post-title">
                                                    <a href="blog-single.html">Advanced Service Functions by Air Transport</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="wt-post-media">
                                            <img src="{{ asset("assets/images/blog/recent-blog/pic3.jpg") }}" alt="">
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-header">
                                                <span class="post-date">April 15, 2023</span>
                                                <span class="post-title">
                                                    <a href="blog-single.html">Proper arrangement for keeping the goods in the warehouse</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="wt-post-media">
                                            <img src="{{ asset("assets/images/blog/recent-blog/pic4.jpg") }}" alt="">
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-header">
                                                <span class="post-date">April 18, 2023</span>
                                                <span class="post-title">
                                                    <a href="blog-single.html">Equipment you can count on. People you can trust.</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="widget-post clearfix">
                                        <div class="wt-post-media">
                                            <img src="{{ asset("assets/images/blog/recent-blog/pic5.jpg") }}" alt="">
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-header">
                                                <span class="post-date">April 20, 2023</span>
                                                <span class="post-title">
                                                    <a href="blog-single.html">Proper arrangement for keeping the goods in the warehouse</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="widget tw-sidebar-tags-wrap">
                            <h4 class="section-head-small mb-4">Tags</h4>

                            <div class="tagcloud">
                                <a href="job-list.html">General</a>
                                <a href="job-list.html">Jobs </a>
                                <a href="job-list.html">Payment</a>
                                <a href="job-list.html">Application </a>
                                <a href="job-list.html">Work</a>
                                <a href="job-list.html">Recruiting</a>
                                <a href="job-list.html">Employer</a>
                                <a href="job-list.html">Income</a>
                                <a href="job-list.html">Tips</a>
                            </div>
                        </div>


                    </div>


                </div>

            </div>
        </div>
    </div>

@endsection

@push("js")

@endpush