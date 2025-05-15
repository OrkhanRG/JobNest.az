@extends("layouts.front")
@section("title", "Vakansiya Detallı")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "PHP Developer",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "PHP Developer",
                "url" => route("front.vacancy", "test")
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
                        <!-- Candidate detail START -->
                        <div class="cabdidate-de-info">
                            <div class="twm-job-self-wrap">
                                <div class="twm-job-self-info">
                                    <div class="twm-job-self-top">
                                        <div class="twm-media-bg">
                                            <img src="{{ asset("assets/front/images/job-detail-bg.jpg") }}" alt="#">
                                            <div class="twm-jobs-category green"><span class="twm-bg-green">New</span></div>
                                        </div>


                                        <div class="twm-mid-content">

                                            <div class="twm-media">
                                                <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="#">
                                            </div>

                                            <h4 class="twm-job-title">Senior Web Designer , Developer <span class="twm-job-post-duration">/ 1 days ago</span></h4>
                                            <p class="twm-job-address"><i class="feather-map-pin"></i>1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            <div class="twm-job-self-mid">
                                                <div class="twm-job-self-mid-left">
                                                    <a href="https://themeforest.net/user/thewebmax/portfolio" class="twm-job-websites site-text-primary">https://thewebmax.com</a>
                                                    <div class="twm-jobs-amount">$2000 - $2500 <span>/ Month</span></div>
                                                </div>
                                                <div class="twm-job-apllication-area">Application ends:
                                                    <span class="twm-job-apllication-date">October 1, 2025</span>
                                                </div>
                                            </div>

                                            <div class="twm-job-self-bottom">
                                                <a class="site-button" data-bs-toggle="modal" href="#apply_job_popup" role="button">
                                                    Apply Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <h4 class="twm-s-title">Job Description:</h4>

                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                            </p>

                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>


                            <h4 class="twm-s-title">Requirments:</h4>
                            <ul class="description-list-2">
                                <li>
                                    <i class="feather-check"></i>
                                    Must be able to communicate with others to convey information effectively.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Personally passionate and up to date with current trends and technologies, committed to quality and comfortable working with adult media.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Rachelor or Master degree level educational background.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    4 years relevant PHP dev experience.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Troubleshooting, testing and maintaining the core product software and databases.
                                </li>

                            </ul>

                            <h4 class="twm-s-title">Responsabilities:</h4>
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
                                    Partnering with product and engineering to translate business and user goals into elegant and practical designs. that can deliver on key business and user metrics.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Create wireframes, storyboards, user flows, process flows and site maps to communicate interaction and design.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Present and defend designs and key deliverables to peers and executive level stakeholders.
                                </li>
                                <li>
                                    <i class="feather-check"></i>
                                    Execute all visual design stages from concept to final hand-off to engineering.
                                </li>

                            </ul>

                            <h4 class="twm-s-title">Share Profile</h4>
                            <div class="twm-social-tags">
                                <a href="javascript:void(0)" class="fb-clr">Facebook</a>
                                <a href="javascript:void(0)" class="tw-clr">Twitter</a>
                                <a href="javascript:void(0)" class="link-clr">Linkedin</a>
                                <a href="javascript:void(0)" class="whats-clr">Whatsapp</a>
                                <a href="javascript:void(0)" class="pinte-clr">Pinterest</a>
                            </div>

                            <h4 class="twm-s-title">Location</h4>
                            <div class="twm-m-map mb-5">
                                <div class="twm-m-map-iframe">
                                    <iframe height="310" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.8534521658976!2d-118.2533646842856!3d34.073270780600225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c6fd9829c6f3%3A0x6ecd11bcf4b0c23a!2s1363%20Sunset%20Blvd%2C%20Los%20Angeles%2C%20CA%2090026%2C%20USA!5e0!3m2!1sen!2sin!4v1620815366832!5m2!1sen!2sin"></iframe>
                                </div>
                            </div>

                            <div class="twm-two-part-section">
                                <div class="row">

                                    <div class="col-lg-6 col-md-12">
                                        <h4 class="twm-s-title">Office Photos</h4>
                                        <div class="tw-sidebar-gallery">
                                            <ul>
                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic1.jpg") }}") }}" title="Title 1" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic2.jpg") }}" title="Title 2" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb ">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic3.jpg") }}" title="Title 3"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic4.jpg") }}" title="Title 4"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic5.jpg") }}" title="Title 5"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic6.jpg") }}" title="Title 6"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic7.jpg") }}" title="Title 7" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic1.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic7.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic8.jpg") }}" title="Title 8" data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic2.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic8.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb ">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic9.jpg") }}" title="Title 9"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic3.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic9.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic10.jpg") }}" title="Title 10"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic4.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic10.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic11.jpg") }}" title="Title 11"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic5.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic11.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tw-service-gallery-thumb">
                                                        <a class="elem" href="{{ asset("assets/front/images/gallery/pic12.jpg") }}" title="Title 12"  data-lcl-author="" data-lcl-thumb="{{ asset("assets/front/images/gallery/thumb/pic6.jpg") }}">
                                                            <img src="{{ asset("assets/front/images/gallery/thumb/pic12.jpg") }}" alt="">
                                                            <i class="fa fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <h4 class="twm-s-title">Video</h4>
                                        <div class="video-section-first" style="background-image: url({{ asset("assets/front/images/video-bg.jpg") }});">
                                            <a href="https://www.youtube.com/watch?v=c1XNqw2gSbU" class="mfp-video play-now-video">
                                                <i class="icon feather-play"></i>
                                                <span class="ripple"></span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 rightSidebar">

                        <div class="side-bar mb-4">
                            <div class="twm-s-info2-wrap mb-5">
                                <div class="twm-s-info2">
                                    <h4 class="section-head-small mb-4">Job Information</h4>
                                    <ul class="twm-job-hilites">
                                        <li>
                                            <i class="fas fa-calendar-alt"></i>
                                            <span class="twm-title">Date Posted</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-eye"></i>
                                            <span class="twm-title">8160 Views</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-file-signature"></i>
                                            <span class="twm-title">6 Applicants</span>
                                        </li>
                                    </ul>
                                    <ul class="twm-job-hilites2">

                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span class="twm-title">Date Posted</span>
                                                <div class="twm-s-info-discription">April 22, 2023</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span class="twm-title">Location</span>
                                                <div class="twm-s-info-discription">Munchen, Germany</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-user-tie"></i>
                                                <span class="twm-title">Job Title</span>
                                                <div class="twm-s-info-discription">Web Developer</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-clock"></i>
                                                <span class="twm-title">Experience</span>
                                                <div class="twm-s-info-discription">3 Year</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-suitcase"></i>
                                                <span class="twm-title">Qualification</span>
                                                <div class="twm-s-info-discription">Bachelor Degree </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">
                                                <i class="fas fa-venus-mars"></i>
                                                <span class="twm-title">Gender</span>
                                                <div class="twm-s-info-discription">Both</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="twm-s-info-inner">

                                                <i class="fas fa-money-bill-wave"></i>
                                                <span class="twm-title">Offered Salary</span>
                                                <div class="twm-s-info-discription">$2000-$2500 / Month</div>
                                            </div>
                                        </li>

                                    </ul>

                                </div>
                            </div>

                            <div class="widget tw-sidebar-tags-wrap">
                                <h4 class="section-head-small mb-4">Job Skills</h4>

                                <div class="tagcloud">
                                    <a href="javascript:void(0)">Html</a>
                                    <a href="javascript:void(0)">Python</a>
                                    <a href="javascript:void(0)">WordPress</a>
                                    <a href="javascript:void(0)">JavaScript</a>
                                    <a href="javascript:void(0)">Figma</a>
                                    <a href="javascript:void(0)">Angular</a>
                                    <a href="javascript:void(0)">Reactjs</a>
                                    <a href="javascript:void(0)">Drupal</a>
                                    <a href="javascript:void(0)">Joomla</a>
                                </div>
                            </div>

                        </div>

                        <div class="twm-s-info3-wrap mb-5">
                            <div class="twm-s-info3">
                                <div class="twm-s-info-logo-section">
                                    <div class="twm-media">
                                        <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="#">
                                    </div>
                                    <h4 class="twm-title">Senior Web Designer , Developer</h4>
                                </div>
                                <ul>

                                    <li>
                                        <div class="twm-s-info-inner">
                                            <i class="fas fa-building"></i>
                                            <span class="twm-title">Company</span>
                                            <div class="twm-s-info-discription">Software Development</div>
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
                                            <i class="fas fa-desktop"></i>
                                            <span class="twm-title">Website</span>
                                            <div class="twm-s-info-discription">https://themeforest.net</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="twm-s-info-inner">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span class="twm-title">Address</span>
                                            <div class="twm-s-info-discription">1363-1385 Sunset Blvd Angeles, CA
                                                90026 ,USA</div>
                                        </div>
                                    </li>

                                </ul>
                                <a href="about-1.html" class=" site-button">Vew Profile</a>

                            </div>
                        </div>

                        <div class="twm-advertisment" style="background-image:url({{ asset("assets/front/images/add-bg.jpg") }});">
                            <div class="overlay"></div>
                            <h4 class="twm-title">Recruiting?</h4>
                            <p>Get Best Matched Jobs On your <br>
                             Email. Add Resume NOW!</p>
                             <a href="javascript:;" class="site-button white">Read More</a>
                         </div>


                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection

@push("js")

@endpush
