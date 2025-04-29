@extends("layouts.front")
@section("title", "Dashboard")

@push("css")

@endpush

@section("contents")

    <div class="section-full p-t120  p-b90 site-bg-white">
        <div class="container">
            <div class="row">

                @include("layouts.front.components.sections.sidebar-candidate-management")

                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <!--Filter Short By-->
                    <div class="twm-right-section-panel site-bg-gray">
                        <form>


                            <!--Basic Information-->
                            <div class="panel panel-default">
                                <div class="panel-heading wt-panel-heading p-a20">
                                    <h4 class="panel-tittle m-a0">Basic Informations</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                    <div class="row">

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_name" type="text" placeholder="Devid Smith">
                                                        <i class="fs-input-icon fa fa-user "></i>
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


                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Qualification</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="BTech">
                                                        <i class="fs-input-icon fa fa-user-graduate"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Language</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="e.x English, Spanish">
                                                        <i class="fs-input-icon fa fa-language"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>Job Category</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="IT & Software">
                                                        <i class="fs-input-icon fa fa-border-all"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>Experience</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="05 Years">
                                                        <i class="fs-input-icon fa fa-user-edit"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>Current Salary</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="65K">
                                                        <i class="fs-input-icon fa fa-dollar-sign"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>Expected Salary</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="75K">
                                                        <i class="fs-input-icon fa fa-dollar-sign"></i>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="form-group city-outer-bx has-feedback">
                                                    <label>Age</label>
                                                    <div class="ls-inputicon-box">
                                                        <input class="form-control" name="company_since" type="text" placeholder="35 Years">
                                                        <i class="fs-input-icon fa fa-child"></i>
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
                                <div class="panel-body wt-panel-body p-a20 m-b30 ">

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
