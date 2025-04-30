        <footer class="footer-dark" style="background-image: url({{ asset("assets/images/f-bg.jpg") }});">
            <div class="container">

                <!-- NEWS LETTER SECTION START -->
                <div class="ftr-nw-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="ftr-nw-title">
                                Yeni iş yerləri və bildirişlər haqqında yenilikləri əldə etmək üçün
                                indi e-poçt abunəliyimizə qoşulun.
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form>
                                <div class="ftr-nw-form">
                                    <input name="news-letter" class="form-control" placeholder="E-poçtunuzu daxil edin" type="text">
                                    <button class="ftr-nw-subcribe-btn">Abunə Ol</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- NEWS LETTER SECTION END -->
                <!-- FOOTER BLOCKES START -->
                <div class="footer-top">
                    <div class="row">

                        <div class="col-lg-3 col-md-12">

                            <div class="widget widget_about">
                                <div class="logo-footer clearfix">
                                    <a href="{{ route("front.index") }}"><img src="{{ asset("assets/images/logo-light.png") }}" alt=""></a>
                                </div>
                                <p>JobNest — Peşəkarlar burada birləşir!</p>
                                <ul class="ftr-list">
                                    <li><p><span>Address :</span>Azerbaijan, Baku </p></li>
                                    <li><p><span>Email :</span>contact@jobnest.com</p></li>
                                    <li><p><span>Call :</span>+994-XX-XXX-XX-XX</p></li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-lg-9 col-md-12">
                            <div class="row">

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget widget_services ftr-list-center">
                                        <h3 class="widget-title">İşaxtaranlar üçün</h3>
                                        <ul>
                                            <li><a href="dashboard.html">User Dashboard</a></li>
                                            <li><a href="dash-resume-alert.html">Alert resume</a></li>
                                            <li><a href="candidate-grid.html">Candidates</a></li>
                                            <li><a href="blog-list.html">Blog List</a></li>
                                            <li><a href="blog-single.html">Blog single</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget widget_services ftr-list-center">
                                        <h3 class="widget-title">İşəgötürənlər üçün</h3>
                                        <ul>
                                            <li><a href="dash-post-job.html">Post Jobs</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="job-list.html">Jobs Listing</a></li>
                                            <li><a href="job-detail.html">Jobs details</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget widget_services ftr-list-center">
                                        <h3 class="widget-title">Faydalı Resurslar</h3>
                                        <ul>
                                            <li><a href="{{ route("front.faq") }}">TVS</a></li>
                                            <li><a href="{{ route("front.blogs") }}">Məqalələr</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="widget widget_services ftr-list-center">
                                        <h3 class="widget-title">Sürətli Keçidlər</h3>
                                        <ul>
                                            <li><a href="{{ route("front.index") }}">Əsas</a></li>
                                            <li><a href="{{ route("front.vacancies") }}">Vakansiyalar</a></li>
                                            <li><a href="{{ route("front.companies") }}">Şirkətlər</a></li>
                                            <li><a href="{{ route("front.candidates") }}">CV-lər</a></li>
                                            <li><a href="{{ route("front.about-us") }}">Haqqımızda</a></li>
                                            <li><a href="{{ route("front.contact-us") }}">Əlaqə</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- FOOTER COPYRIGHT -->
                <div class="footer-bottom">

                    <div class="footer-bottom-info">

                        <div class="footer-copy-right">
                            <span class="copyrights-text">Copyright © {{ date("Y") }} by JobNest All Rights Reserved.</span>
                        </div>
                        <ul class="social-icons">
                            <li><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                            <li><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                            <li><a href="javascript:void(0);" class="fab fa-instagram"></a></li>
                            <li><a href="javascript:void(0);" class="fab fa-youtube"></a></li>
                        </ul>

                    </div>

                </div>

            </div>

        </footer>

        <!-- BUTTON TOP START -->
		<button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

 	</div>



<!-- JAVASCRIPT  FILES ========================================= -->
<script  src={{ asset("assets/js/jquery-3.6.0.min.js") }}></script><!-- JQUERY.MIN JS -->
<script  src={{ asset("assets/js/popper.min.js") }}></script><!-- POPPER.MIN JS -->
<script  src={{ asset("assets/js/bootstrap.min.js") }}></script><!-- BOOTSTRAP.MIN JS -->
<script  src={{ asset("assets/js/magnific-popup.min.js") }}></script><!-- MAGNIFIC-POPUP JS -->
<script  src={{ asset("assets/js/waypoints.min.js") }}></script><!-- WAYPOINTS JS -->
<script  src={{ asset("assets/js/counterup.min.js") }}></script><!-- COUNTERUP JS -->
<script  src={{ asset("assets/js/waypoints-sticky.min.js") }}></script><!-- STICKY HEADER -->
<script  src={{ asset("assets/js/isotope.pkgd.min.js") }}></script><!-- MASONRY  -->
<script  src={{ asset("assets/js/imagesloaded.pkgd.min.js") }}></script><!-- MASONRY  -->
<script  src={{ asset("assets/js/owl.carousel.min.js") }}></script><!-- OWL  SLIDER  -->
<script  src={{ asset("assets/js/theia-sticky-sidebar.js") }}></script><!-- STICKY SIDEBAR  -->
<script  src={{ asset("assets/js/lc_lightbox.lite.js") }} ></script><!-- IMAGE POPUP -->
<script  src={{ asset("assets/js/bootstrap-select.min.js") }}></script><!-- Form js -->
<script  src={{ asset("assets/js/dropzone.js") }}></script><!-- IMAGE UPLOAD  -->
<script  src={{ asset("assets/js/jquery.scrollbar.js") }}></script><!-- scroller -->
<script  src={{ asset("assets/js/bootstrap-datepicker.js") }}></script><!-- scroller -->
<script  src={{ asset("assets/js/jquery.dataTables.min.js") }}></script><!-- Datatable -->
<script  src={{ asset("assets/js/dataTables.bootstrap5.min.js") }}></script><!-- Datatable -->
<script  src={{ asset("assets/js/chart.js") }}></script><!-- Chart -->
<script  src={{ asset("assets/js/bootstrap-slider.min.js") }}></script><!-- Price range slider -->
<script  src={{ asset("assets/js/swiper-bundle.min.js") }}></script><!-- Swiper JS -->
<script  src={{ asset("assets/js/custom.js") }}></script><!-- CUSTOM FUCTIONS  -->
<script  src={{ asset("assets/js/switcher.js") }}></script><!-- SHORTCODE FUCTIONS  -->

<script>
    let registerRoute = "{{ route("register") }}";
    $(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $(`meta[name="csrf-token"]`).attr("content")
            }
        })
    })
</script>

<script  src="{{ asset("assets/custom/js/helper.js") }}"></script>
<script  src="{{ asset("assets/custom/js/app.js") }}"></script>
<script  src="{{ asset("assets/custom/js/login.js") }}"></script>
<script  src="{{ asset("assets/custom/js/register.js") }}"></script>

@stack("js")

</body>

</html>
