@extends("layouts.front")
@section("title", "Haqqımızda")

@push("css")

@endpush

@section("contents")
    <!-- INNER PAGE BANNER -->
    @include("layouts.front.components.breadcrumb", [
        "title" => "Bizimlə Əlaqə",
        "links" => [
            [
                "name" => "Əsas",
                "url" => route("front.index")
            ],
            [
                "name" => "Əlaqə",
                "url" => route("front.contact-us")
            ]
        ]
    ])
    <!-- INNER PAGE BANNER END -->

    <div class="section-full twm-contact-one">
        <div class="section-content">
            <div class="container">

                <!-- CONTACT FORM-->
                <div class="contact-one-inner">
                    <div class="row">

                        <div class="col-lg-6 col-md-12">
                            <div class="contact-form-outer">

                                <!-- TITLE START-->
                                <div class="section-head left wt-small-separator-outer">
                                    <h2 class="wt-title">Send Us a Message</h2>
                                    <p>Feel free to contact us and we will get back to you as soon as we can.</p>
                                </div>
                                <!-- TITLE END-->

                                <form  class="cons-contact-form" method="post" action="https://thewebmax.org/jobzilla/form-handler2.php">
                                    <div class="row">

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <input name="username" type="text" required class="form-control" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                            <input name="email" type="text" class="form-control" required placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <input name="phone" type="text" class="form-control" required placeholder="Phone">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <input name="subject" type="text" class="form-control" required placeholder="Subject">
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
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="contact-info-wrap">

                                <div class="contact-info">
                                    <div class="contact-info-section">

                                            <div class="c-info-column">
                                                <div class="c-info-icon"><i class=" fas fa-map-marker-alt"></i></div>
                                                <h3 class="twm-title">In the bay area?</h3>
                                                <p>1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                            </div>

                                            <div class="c-info-column">
                                                <div class="c-info-icon custome-size"><i class="fas fa-mobile-alt"></i></div>
                                                <h3 class="twm-title">Feel free to contact us</h3>
                                                <p><a href="tel:+216-761-8331">+2 900 234 4241</a></p>
                                                <p><a href="tel:+216-761-8331">+2 900 234 3219</a></p>
                                            </div>

                                            <div class="c-info-column">
                                                <div class="c-info-icon"><i class="fas fa-envelope"></i></div>
                                                <h3 class="twm-title">Support</h3>
                                                <p>infohelp@gmail.com</p>
                                                <p>support12@gmail.com</p>
                                            </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="gmap-outline">
        <div class="google-map">
            <div style="width: 100%">
                <iframe height="460" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.8534521658976!2d-118.2533646842856!3d34.073270780600225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c6fd9829c6f3%3A0x6ecd11bcf4b0c23a!2s1363%20Sunset%20Blvd%2C%20Los%20Angeles%2C%20CA%2090026%2C%20USA!5e0!3m2!1sen!2sin!4v1620815366832!5m2!1sen!2sin"></iframe>
            </div>
        </div>
    </div>

@endsection

@push("js")

@endpush