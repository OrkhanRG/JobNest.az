@extends("layouts.front")
@section("title", "Məqalələ Detallı")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Məqalələ Detallı",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "Məqalələ Detallı",
                "url" => route("front.blog", "test")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    <div class="section-full  p-t120 p-b90 bg-white">
        <div class="container">

            <!-- BLOG SECTION START -->
            <div class="section-content">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-8 col-md-12">
                        <!-- BLOG START -->
                        <div class="blog-post-single-outer">
                            <div class="blog-post-single bg-white">

                                <div class="wt-post-info">

                                    <div class="wt-post-media m-b30">
                                        <img src="{{ asset("assets/front/images/blog/blog-single/1.jpg") }}" alt="">
                                    </div>

                                    <div class="wt-post-title ">
                                        <div class="wt-post-meta-list">
                                            <div class="wt-list-content post-date">April 05, 2023</div>
                                            <div class="wt-list-content post-author">By Mark Petter</div>
                                        </div>
                                        <h3 class="post-title">How to convince recruiters and get your dream job</h3>

                                    </div>

                                    <div class="wt-post-discription">

                                        <p>
                                            Please make sure you understand what rights you are claiming before you submit a DMCA takedown
notice because it is a serious legal document. Consider whether you need legal advice. It's really
important not to make false claims as this could have serious legal consequences.
                                        </p>

                                        <p>
                                            penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.Harvel is a copyright protection platform for next-gen creators, crawling the web on a daily basis in order to find piracy links and copyright infringement of your content. I
                                        </p>

                                        <h4 class="twm-blog-s-title">About Business Network</h4>

                                        <p>
                                            Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod and pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales.
                                        </p>

                                        <div class="wt-post-discription">
                                            <blockquote>
                                                <p><span>"</span> A business consulting agency is involved in the planning, implementation,
                                                    and education  of businesses.
                                                </p>
                                                <strong>Richard Anderson</strong>
                                            </blockquote>
                                        </div>

                                        <h4 class="twm-blog-s-title">Get Your Resume Done Right</h4>

                                        <p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod and pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. </p>

                                    </div>


                                    <div class="post-single-list">
                                        <ul class="description-list-2">
                                            <li>
                                                <i class="feather-check"></i>
                                                You need to create an account to find the best and preferred job.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i>
                                                After creating the account, you have to apply for the desired job.
                                            </li>
                                            <li>
                                                <i class="feather-check"></i>
                                                After filling all the relevant information you have to upload your resume.
                                            </li>

                                        </ul>

                                    </div>


                                    <div class="twm-posts-author">
                                        <div class="twm-post-author-pic">
                                            <img src="{{ asset("assets/front/images/blog/post-author.jpg") }}" alt="#">
                                        </div>
                                        <div class="twm-post-author-content">
                                            <span>435 Posts Since 2018</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            </p>
                                            <strong>Rosalina William</strong>
                                        </div>
                                    </div>



                                </div>



                            </div>

                            <div class="post-area-tags-wrap">
                                <div class="post-social-icons-wrap">
                                    <h4 class="mb-4">Share</h4>
                                    <ul class="post-social-icons">
                                        <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                                        <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                                        <li><a href="javascript:void(0);" class="fab fa-linkedin-in"></a></li>
                                        <li><a href="javascript:void(0);" class="fab fa-google"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="post-navigation m-t30">
                                <div class="post-nav-links">
                                    <div class="post-nav-item nav-post-prev">
                                        <div class="nav-post-arrow">
                                            <a href="blog-list.html">
                                                <i class="fa fa-angle-left"></i>
                                            </a>
                                        </div>
                                        <div class="nav-post-meta">
                                            <a href="blog-list.html">The wise man therefore always holds
                                                in these matters to this principle</a>
                                        </div>
                                    </div>
                                    <div class="post-nav-item nav-post-next">
                                        <div class="nav-post-arrow">
                                            <a href="blog-list.html">
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                        <div class="nav-post-meta">
                                            <a href="blog-list.html">Rejects pleasures to secure other
                                                greater pleasures</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clear" id="comment-list">
                                <div class="comments-area" id="comments">
                                    <h3 class="section-head-small mb-4">Comments</h3>
                                    <div>
                                        <!-- COMMENT LIST START -->
                                        <ol class="comment-list">
                                            <li class="comment">
                                                <!-- COMMENT BLOCK -->
                                                <div class="comment-body">

                                                    <div class="comment-author">
                                                        <img class="avatar photo" src="{{ asset("assets/front/images/blog/comment/pic1.jpg") }}" alt="">
                                                        <div class="comment-meta">
                                                            <a href="javascript:void(0);">Apr 05, 2023</a>
                                                        </div>
                                                    </div>
                                                    <div class="comment-info">
                                                        <cite class="fn">Richard Anderson</cite>
                                                        <div class="reply">
                                                            <a href="javscript:;" class="comment-reply-link">Reply</a>
                                                        </div>
                                                        <p>No one rejects, dislikes, or avoids pleasure itself, because pleasure, but
                                                            because those who do not know how to pursue.
                                                        </p>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="comment">
                                                <!-- COMMENT BLOCK -->
                                                <div class="comment-body">

                                                    <div class="comment-author">
                                                        <img class="avatar photo" src="{{ asset("assets/front/images/blog/comment/pic2.jpg") }}" alt="">
                                                        <div class="comment-meta">
                                                            <a href="javascript:void(0);">Apr 08, 2023</a>
                                                        </div>
                                                    </div>
                                                    <div class="comment-info">
                                                        <cite class="fn">Devid Abraham</cite>
                                                        <div class="reply">
                                                            <a href="javscript:;" class="comment-reply-link">Reply</a>
                                                        </div>
                                                        <p>No one rejects, dislikes, or avoids pleasure itself, because pleasure, but
                                                            because those who do not know how to pursue.
                                                        </p>
                                                    </div>

                                                </div>
                                                <!-- SUB COMMENT BLOCK -->

                                            </li>
                                        </ol>
                                        <!-- COMMENT LIST END -->

                                        <!-- LEAVE A REPLY START -->
                                        <div class="comment-respond m-t30" id="respond">

                                            <h3 class="comment-reply-title section-head-small mb-4" id="reply-title">Leave a reply
                                                <small>
                                                    <a style="display:none;" href="#" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a>
                                                </small>
                                            </h3>

                                            <form class="comment-form" id="commentform" method="post">
                                                <div class="row">
                                                    <div class="comment-form-author col-md-6 mb-3">
                                                        <label>Your Name* <span class="required">*</span></label>
                                                        <input class="form-control" type="text" value="" name="user-comment" placeholder="Your Name*" id="author">
                                                    </div>

                                                    <div class="comment-form-email col-md-6 mb-3">
                                                        <label>Your Email* <span class="required">*</span></label>
                                                        <input class="form-control" type="text" value="" name="email" placeholder="Your Email*">
                                                    </div>

                                                    <div class="comment-form-comment col-md-12 mb-4">
                                                        <label>Message*</label>
                                                        <textarea class="form-control" rows="8" name="comment" placeholder="Message*" id="comment"></textarea>
                                                    </div>

                                                    <div class="form-submit">
                                                        <button type="submit" class="site-button">Submit Now</button>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                        <!-- LEAVE A REPLY END -->
                                </div>
                                </div>
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
                                                <img src="{{ asset("assets/front/>images/blog/recent-blog/pic1.jpg") }}" alt="">
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
                                                <img src="{{ asset("assets/front/images/blog/recent-blog/pic2.jpg") }}" alt="">
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
                                                <img src="{{ asset("assets/front/images/blog/recent-blog/pic3.jpg") }}" alt="">
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
                                                <img src="{{ asset("assets/front/images/blog/recent-blog/pic4.jpg") }}" alt="">
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
                                                <img src="{{ asset("assets/front/images/blog/recent-blog/pic5.jpg") }}" alt="">
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

    </div>

@endsection

@push("js")

@endpush
