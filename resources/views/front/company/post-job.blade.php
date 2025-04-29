@extends("layouts.front")
@section("title", "Dashboard")

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
                                    <h4 class="panel-tittle m-a0"><i class="fa fa-suitcase"></i>Job Details</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 m-b30 ">

                                    <div class="row">
                                        <!--Job title-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Job Title</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_name" type="text" placeholder="Devid Smith">
                                                    <i class="fs-input-icon fa fa-address-card"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Job Category-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group city-outer-bx has-feedback">
                                                <label>Job Category</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="j-category" data-bv-field="size">
                                                        <option disabled selected value="">Select Category</option>
                                                        <option>Accounting and Finance</option>
                                                        <option>Clerical &amp; Data Entry</option>
                                                        <option>Counseling</option>
                                                        <option>Court Administration</option>
                                                        <option>Human Resources</option>
                                                        <option>Investigative</option>
                                                        <option>IT and Computers</option>
                                                        <option>Law Enforcement</option>
                                                        <option>Management</option>
                                                        <option>Miscellaneous</option>
                                                        <option>Public Relations</option>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-border-all"></i>
                                                </div>

                                            </div>
                                        </div>

                                        <!--Job Type-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Job Type</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="s-category" data-bv-field="size">
                                                        <option class="bs-title-option" value="">Select Category</option>
                                                        <option>Full Time</option>
                                                        <option>Freelance</option>
                                                        <option>Part Time</option>
                                                        <option>Internship</option>
                                                        <option>Temporary</option>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-file-alt"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <!--Offered Salary-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Offered Salary</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="salary" data-bv-field="size">
                                                        <option class="bs-title-option" value="">Salary</option>
                                                        <option>$500</option>
                                                        <option>$1000</option>
                                                        <option>$1500</option>
                                                        <option>$2000</option>
                                                        <option>$2500</option>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Experience-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Experience</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="E.g. Minimum 3 years">
                                                    <i class="fs-input-icon fa fa-user-edit"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Qualification-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="Qualification Title">
                                                    <i class="fs-input-icon fa fa-user-graduate"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Gender-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="gender" data-bv-field="size">
                                                        <option class="bs-title-option" value="">Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-venus-mars"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Country-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="country" data-bv-field="size">
                                                        <option class="bs-title-option" value="">Country</option>
                                                        <option>Afghanistan</option>
                                                        <option>Albania</option>
                                                        <option>Algeria</option>
                                                        <option>Andorra</option>
                                                        <option>Angola</option>
                                                        <option>Antigua and Barbuda</option>
                                                        <option>Argentina</option>
                                                        <option>Armenia</option>
                                                        <option>Australia</option>
                                                        <option>Austria</option>
                                                        <option>Azerbaijan</option>
                                                        <option>The Bahamas</option>
                                                        <option>Bahrain</option>
                                                        <option>Bangladesh</option>
                                                        <option>Barbados</option>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <!--City-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>City</label>
                                                <div class="ls-inputicon-box">
                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" id="city" data-bv-field="size">
                                                        <option class="bs-title-option" value="">City</option>
                                                        <option>Sydney</option>
                                                        <option>Melbourne</option>
                                                        <option>Brisbane</option>
                                                        <option>Perth</option>
                                                        <option>Adelaide</option>
                                                        <option>Gold Coast</option>
                                                        <option>Cranbourne</option>
                                                        <option>Newcastle</option>
                                                        <option>Wollongong</option>
                                                        <option>Geelong</option>
                                                        <option>Hobart</option>
                                                        <option>Townsville</option>
                                                        <option>Ipswich</option>
                                                    </select>
                                                    <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                        </div>


                                        <!--Location-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="Type Address">
                                                    <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Latitude-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Latitude</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="Los Angeles">
                                                    <i class="fs-input-icon fa fa-map-pin"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--longitude-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Longitude</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="Los Angeles">
                                                    <i class="fs-input-icon fa fa-map-pin"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Email Address-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_Email" type="email" placeholder="Devid@example.com">
                                                    <i class="fs-input-icon fas fa-at"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Website-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Website</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_website" type="text" placeholder="https://.../">
                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Est. Since-->
                                        <div class="col-xl-4 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Est. Since</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_since" type="text" placeholder="Since...">
                                                    <i class="fs-input-icon fa fa-clock"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Complete Address-->
                                        <div class="col-xl-12 col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Complete Address</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control" name="company_since" type="text" placeholder="1363-1385 Sunset Blvd Los Angeles, CA 90026, USA">
                                                    <i class="fs-input-icon fa fa-home"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Description-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="3" placeholder="Greetings! We are Galaxy Software Development Company. We hope you enjoy our services and quality."></textarea>
                                            </div>
                                        </div>

                                        <!--Start Date-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Date-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <div class="ls-inputicon-box">
                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-left">
                                                <button type="submit" class="site-button m-r5">Publish Job</button>
                                                <button type="submit" class="site-button outline-primary">Save Draft</button>
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
