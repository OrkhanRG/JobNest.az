<header  class="site-header header-style-3 mobile-sider-drawer-menu">

    <div class="sticky-header main-bar-wraper  navbar-expand-lg">
        <div class="main-bar">

            <div class="container-fluid clearfix">

                <div class="logo-header">
                    <div class="logo-header-inner logo-header-one">
                        <a href="{{ route("front.index") }}">
                        <img src="{{ asset("assets/front/images/logo-dark.png") }}" alt="">
                        </a>
                    </div>
                </div>

                <!-- NAV Toggle Button -->
                <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggler collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar icon-bar-first"></span>
                    <span class="icon-bar icon-bar-two"></span>
                    <span class="icon-bar icon-bar-three"></span>
                </button>

                <!-- MAIN Vav -->
                <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-center">

                    <ul class=" nav navbar-nav">
                        <li class="has-mega-menu {{ Route::is("front.index") ? "active" : "" }}">
                            <a href="{{ route("front.index") }}">{{ lang("main", "app") }}</a>
                        </li>
                        <li class="has-mega-menu {{ Route::is("front.vacancies") ? "active" : "" }}">
                            <a href="{{ route("front.vacancies") }}">{{ lang("vacancies", "app") }}</a>
                        </li>
                        <li class="has-mega-menu {{ Route::is("front.companies") ? "active" : "" }}">
                            <a href="{{ route("front.companies") }}">{{ lang("companies", "app") }}</a>
                        </li>
                        <li class="has-mega-menu {{ Route::is("front.candidates") ? "active" : "" }}">
                            <a href="{{ route("front.candidates") }}">{{ lang("resumes", "app") }}</a>
                        </li>
                        <li class="has-mega-menu {{ Route::is("front.about-us") ? "active" : "" }}">
                            <a href="{{ route("front.about-us") }}">{{ lang("about_us", "app") }}</a>
                        </li>
                        @if (false)
                            <li class="has-mega-menu {{ Route::is("front.blogs") ? "active" : "" }}">
                                <a href="{{ route("front.blogs") }}">{{ lang("blogs", "app") }}</a>
                            </li>
                        @endif
                        @if (false)
                            <li class="has-mega-menu {{ Route::is("front.faq") ? "active" : "" }}">
                                <a href="{{ route("front.faq") }}">{{ lang("faq", "app") }}</a>
                            </li>
                        @endif
                        <li class="has-mega-menu {{ Route::is("front.contact-us") ? "active" : "" }}">
                            <a href="{{ route("front.contact-us") }}">{{ lang("contact", "app") }}</a>
                        </li>
                    </ul>

                </div>

                <!-- Header Right Section-->
                <div class="extra-nav header-2-nav">
                    <div class="extra-cell">
                        <div class="header-search">
                            <a href="#search" class="header-search-icon"><i class="feather-search"></i></a>
                        </div>
                    </div>
                    <div class="extra-cell">
                        <div class="header-nav-btn-section">
                            @guest
                                <div class="twm-nav-btn-left">
                                    <a class="twm-nav-sign-up" data-bs-toggle="modal" href="#sign_up_popup2" role="button">
                                        <i class="feather-log-in"></i> Daxil Ol
                                    </a>
                                </div>
                            @endguest
                            @auth
                                @if(auth()->user()->hasRole(["admin", "developer", "moderator"]))
                                    <div class="twm-nav-btn-right">
                                        <a href="{{ route("admin.dashboard") }}" class="twm-nav-post-a-job">
                                            <i class="feather-settings"></i> Panel
                                        </a>
                                    </div>
                                @elseif(auth()->user()->hasRole("company"))
                                    <div class="twm-nav-btn-right">
                                        <a href="{{ route("front.company.dashboard") }}" class="twm-nav-post-a-job">
                                            <i class="feather-briefcase"></i> Yeni vakansiya
                                        </a>
                                    </div>
                                @else
                                    <div class="twm-nav-btn-right">
                                        <a href="{{ route("front.candidate.dashboard") }}" class="twm-nav-post-a-job">
                                            <i class="feather-briefcase"></i> Dashboard
                                        </a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>

                </div>



            </div>


        </div>

        <!-- SITE Search -->
        <div id="search">
            <span class="close"></span>
            <form role="search" id="searchform" action="https://thewebmax.org/search" method="get" class="radius-xl">
                <input class="form-control" value="" name="q" type="search" placeholder="Type to search"/>
                <span class="input-group-append">
                    <button type="button" class="search-btn">
                        <i class="fa fa-paper-plane"></i>
                    </button>
                </span>
            </form>
        </div>
    </div>








</header>
