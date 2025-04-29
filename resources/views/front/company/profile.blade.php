@extends("layouts.front")
@section("title", "Company Profile")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-company-management")

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <!--Filter Short By-->
                    <div class="twm-right-section-panel site-bg-gray">
                        <form>


                            <!--Basic Information-->
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0">Company Profile</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_name" type="text" placeholder="Devid Smith">
                                                    <i class="fs-input-icon fa fa-building"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_phone" type="text" placeholder="(251) 1234-456-7890">
                                                    <i class="fs-input-icon fa fa-phone-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="Devid@example.com">
                                                    <i class="fs-input-icon fas fa-at"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_website" type="text" placeholder="https://devsmith.net/">
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Country</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_since" type="text" placeholder="USA">
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>City</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_since" type="text" placeholder="Texas">
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-12 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Postcode</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_since" type="text" placeholder="75462">
                                                    <i class="fs-input-icon fas fa-map-pin"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Full Address</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_since" type="text" placeholder="1363-1385 Sunset Blvd Angeles, CA 90026 ,USA">
                                                    <i class="fs-input-icon fas fa-map-marker-alt"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="twm-s-map mb-5">
                                                <h4 class="section-head-small mb-4">Location</h4>
                                                <div class="twm-s-map-iframe">
                                                    <iframe height="270" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.8534521658976!2d-118.2533646842856!3d34.073270780600225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c6fd9829c6f3%3A0x6ecd11bcf4b0c23a!2s1363%20Sunset%20Blvd%2C%20Los%20Angeles%2C%20CA%2090026%2C%20USA!5e0!3m2!1sen!2sin!4v1620815366832!5m2!1sen!2sin"></iframe>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="3">Greetings! when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</textarea>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-left">
                                                <button type="submit" class="site-button">Save Changes</button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <!--Social Network-->
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0">Social Network</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20">

                                    <div class="row">

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.facebook.com/">
                                                    <i class="fs-input-icon fab fa-facebook-f"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Twitter</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://twitter.com/">
                                                    <i class="fs-input-icon fab fa-twitter"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>linkedin</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://in.linkedin.com/">
                                                    <i class="fs-input-icon fab fa-linkedin-in"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Whatsapp</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.whatsapp.com/">
                                                    <i class="fs-input-icon fab fa-whatsapp"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.instagram.com/">
                                                    <i class="fs-input-icon fab fa-instagram"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Pinterest</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://in.pinterest.com/">
                                                    <i class="fs-input-icon fab fa-pinterest-p"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Tumblr</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.tumblr.com/">
                                                    <i class="fs-input-icon fab fa-tumblr"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Youtube</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control wt-form-control" name="company_name" type="text" placeholder="https://www.youtube.com/">
                                                    <i class="fs-input-icon fab fa-youtube"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-left">
                                                <button type="submit" class="site-button">Save Changes</button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push("js")

@endpush
