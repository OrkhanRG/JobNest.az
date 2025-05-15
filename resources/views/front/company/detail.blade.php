@extends("layouts.front")
@section("title", "Şirkət Detallı")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t60 p-b90 bg-white">
        <!--Top Wide banner Start-->
        <div class="twm-top-wide-banner overlay-wraper" style="background-image:url({{ asset("assets/front/images/detail-pic/company-bnr1.jpg") }});">
            <div class="overlay-main site-bg-primary opacity-09"></div>

            <div class="twm-top-wide-banner-content container ">

                <div class="twm-mid-content">
                    <div class="twm-employer-self-top">
                        <div class="twm-media">
                            <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="#">
                        </div>

                        <h3 class="twm-job-title">Galaxy Software Development</h3>
                        <p class="twm-employer-address"><i class="feather-map-pin"></i>1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>

                        <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-employer-websites">https://thewebmax.com</a>

                        <div class="twm-ep-detail-tags">
                            <button class="de-info twm-bg-green"><i class="fa fa-check"></i> Verified</button>
                            <button class="de-info twm-bg-brown"><i class="fa fa-heart"></i> Add To Favorite</button>
                            <button class="de-info twm-bg-purple"><i class="fa fa-hand-o-right"></i> Add Review</button>
                            <button class="de-info twm-bg-sky"><i class="fa fa-eye"></i> Viewed</button>
                        </div>


                    </div>

                    <div class="twm-employer-self-bottom">
                        <div class="twm-social-btns">
                            <a class="btn facebook" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn twitter" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a class="btn google" href="javascript:void(0)"><i class="fab fa-google"></i></a>
                            <a class="btn linkedin" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn skype" href="javascript:void(0)"><i class="fab fa-skype"></i></a>
                        </div>
                        <div class="twm-employer-btn-controls">
                            <a href="javascript:;" class="site-button outline-white">Add Review</a>
                            <a href="javascript:;" class="site-button secondry">Follow Us</a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="ani-circle-1 rotate-center"></div>
            <div class="ani-circle-2 rotate-center"></div>

        </div>

        <!--Top Wide banner End-->
        <div class="container">
            <div class="section-content">
                <div class="row d-flex justify-content-center">

                    <div class="col-lg-4 col-md-12 rightSidebar">

                        <div class="side-bar-2">

                            <div class="twm-s-info-wrap mb-5">
                                <h4 class="section-head-small mb-4">Profile Info</h4>
                                <div class="twm-s-info-3">
                                    <ul>

                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span class="twm-title">Offered Salary</span>
                                                <div class="twm-s-info-discription">$20 / Day</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-clock"></i>
                                                <span class="twm-title">Experience</span>
                                                <div class="twm-s-info-discription">6 Year</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-venus-mars"></i>
                                                <span class="twm-title">Gender</span>
                                                <div class="twm-s-info-discription">Male</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-mobile-alt"></i>
                                                <span class="twm-title">Phone</span>
                                                <div class="twm-s-info-discription">+291  560 56456</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-at"></i>
                                                <span class="twm-title">Email</span>
                                                <div class="twm-s-info-discription">thewebmaxdemo@gmail.com</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-book-reader"></i>
                                                <span class="twm-title">Qualification</span>
                                                <div class="twm-s-info-discription">Developer</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">

                                                <i class="fas fa-map-marker-alt"></i>
                                                <span class="twm-title">Address</span>
                                                <div class="twm-s-info-discription">1363-1385 Sunset Blvd Angeles, CA 90026 ,USA</div>
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                            <div class="twm-s-map mb-5">
                                <h4 class="section-head-small mb-4">Location</h4>
                                <div class="twm-s-map-iframe twm-s-map-iframe-2">
                                    <iframe height="270" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.8534521658976!2d-118.2533646842856!3d34.073270780600225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c6fd9829c6f3%3A0x6ecd11bcf4b0c23a!2s1363%20Sunset%20Blvd%2C%20Los%20Angeles%2C%20CA%2090026%2C%20USA!5e0!3m2!1sen!2sin!4v1620815366832!5m2!1sen!2sin"></iframe>
                                </div>
                            </div>

                            <div class="twm-s-contact-wrap mb-5">
                                <h4 class="section-head-small mb-4">Contact us</h4>
                                <div class="twm-s-contact twm-s-contact-2">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input name="username" type="text" required class="form-control" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input name="email" type="text" class="form-control" required placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input name="phone" type="text" class="form-control" required placeholder="Phone">
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <textarea name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="site-button">Submit Now</button>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 col-md-12">
                        <!-- Candidate detail START -->
                        <div class="cabdidate-de-info">

                            <h4 class="twm-s-title m-t0">About Company</h4>

                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                            consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>

                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui  officia deserunt mollitia animi.</p>
                            <p>Opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that  hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly  allegedly more when oh arrogantly vehement irresistibly fussy.? </p>

                            <h4 class="twm-s-title">Responsabilities</h4>
                            <ul class="description-list-2">
                                <li>
                                    <i class="feather-check"></i>
                                    Establish and promote design guidelines, best practices and standards.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Accurately estimate design tickets during planning sessions.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Partnering with product and engineering to translate business and user goals.
                                </li>

                            </ul>

                            <div class="twm-two-part-section">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 m-b30">
                                        <h4 class="twm-s-title">Video</h4>
                                        <div class="video-section-first" style="background-image: url({{ asset("assets/front/images/video-bg.jpg") }});">
                                            <a href="https://www.youtube.com/watch?v=c1XNqw2gSbU" class="mfp-video play-now-video">
                                                <i class="icon feather-play"></i>
                                                <span class="ripple"></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <h4 class="twm-s-title">Office Photos</h4>
                                        <div class="tw-sidebar-gallery-2">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic1.jpg") }}" title="Title 1" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic2.jpg") }}" title="Title 2" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb ">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic3.jpg") }}" title="Title 3"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic4.jpg") }}" title="Title 4"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic5.jpg") }}" title="Title 5"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic6.jpg") }}" title="Title 6"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic7.jpg") }}" title="Title 7" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic7.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic8.jpg") }}" title="Title 8" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic8.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <h4 class="twm-s-title">Available Jobs</h4>
                            <div class="twm-jobs-list-wrap">
                                <ul>
                                     <li>
                                         <div class="twm-jobs-list-style1 mb-5">
                                             <div class="twm-media">
                                                 <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="#">
                                             </div>
                                             <div class="twm-mid-content">
                                                 <a href="job-detail.html" class="twm-job-title">
                                                     <h4>Senior Web Designer<span class="twm-job-post-duration">/ 1 days ago</span></h4>
                                                 </a>
                                                 <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                 <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                             </div>
                                             <div class="twm-right-content">
                                                 <div class="twm-jobs-category green"><span class="twm-bg-green">New</span></div>
                                                 <div class="twm-jobs-amount">$1000 <span>/ Month</span></div>
                                                 <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Browse Job</a>
                                             </div>
                                         </div>
                                     </li>

                                     <li>
                                         <div class="twm-jobs-list-style1 mb-5">
                                             <div class="twm-media">
                                                 <img src="{{ asset("assets/front/images/jobs-company/pic2.jpg") }}" alt="#">
                                             </div>
                                             <div class="twm-mid-content">
                                                 <a href="job-detail.html" class="twm-job-title">
                                                     <h4>Senior Stock Technician<span class="twm-job-post-duration">/ 15 days ago</span></h4>
                                                 </a>
                                                 <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                 <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                             </div>
                                             <div class="twm-right-content">
                                                 <div class="twm-jobs-category green"><span class="twm-bg-brown">Intership</span></div>
                                                 <div class="twm-jobs-amount">$1000 <span>/ Month</span></div>
                                                 <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Browse Job</a>
                                             </div>
                                         </div>
                                     </li>

                                     <li>
                                         <div class="twm-jobs-list-style1 mb-5">
                                             <div class="twm-media">
                                                 <img src="{{ asset("assets/front/images/jobs-company/pic3.jpg") }}" alt="#">
                                             </div>
                                             <div class="twm-mid-content">
                                                 <a href="job-detail.html" class="twm-job-title">
                                                     <h4 class="twm-job-title">IT Department Manager<span class="twm-job-post-duration">/ 6 Month ago</span></h4>
                                                 </a>
                                                 <p class="twm-job-address">1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                 <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                             </div>
                                             <div class="twm-right-content">
                                                 <div class="twm-jobs-category green"><span class="twm-bg-purple">Fulltime</span></div>
                                                 <div class="twm-jobs-amount">$1000 <span>/ Month</span></div>
                                                 <a href="job-detail.html" class="twm-jobs-browse site-text-primary">Browse Job</a>
                                             </div>
                                         </div>
                                     </li>
                                </ul>
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
