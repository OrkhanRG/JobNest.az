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
                    <div class="twm-right-section-panel site-bg-gray">

                            <!--Resume Headline-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Resume Headline</h4>
                                    <a data-bs-toggle="modal" href="#Resume_Headline" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p>Senior UI / UX Designer and Developer at Google INC</p>
                                    </div>
                                </div>
                                <!--Modal Popup -->
                                <div class="modal fade twm-saved-jobs-view" id="Resume_Headline" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Resume Headline</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>

                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group twm-textarea-full">
                                                                    <textarea class="form-control" placeholder="Type Description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Key Skills-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Key Skills</h4>
                                    <a data-bs-toggle="modal" href="#Key_Skills" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="tw-sidebar-tags-wrap">
                                        <div class="tagcloud">
                                            <a href="javascript:void(0)">Finance</a>
                                            <a href="javascript:void(0)">Sales</a>
                                            <a href="javascript:void(0)">Part-time</a>
                                            <a href="javascript:void(0)">Administration</a>
                                            <a href="javascript:void(0)">Retail</a>
                                            <a href="javascript:void(0)">Engineering</a>
                                            <a href="javascript:void(0)">Developer</a>
                                            <a href="javascript:void(0)">Work from home</a>
                                            <a href="javascript:void(0)">IT Consulting</a>
                                            <a href="javascript:void(0)">Manufacturing</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Modal popup -->
                                <div class="modal fade twm-saved-jobs-view" id="Key_Skills" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Key Skills</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>It is the first thing recruiters notice in your profile. Write concisely what makes you unique and right person for the job you are looking for.</p>

                                                    <div class="form-group">
                                                        <input class="form-control"  type="text" value="Finance, Sales, Retail, Engineering">
                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Employment-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Employment</h4>
                                    <a data-bs-toggle="modal" href="#Employment" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p><b>Senior UI / UX Designer and Developer</b></p>
                                        <p>Google INC</p>
                                        <p>Experience (6 Year)</p>
                                        <p>Available to join in 1 Months</p>
                                    </div>
                                </div>

                                <!--Employment -->
                                <div class="modal fade twm-saved-jobs-view" id="Employment" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Add Employment</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Your Designation</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control"  type="text" placeholder="Enter Your Designation">
                                                                    <i class="fs-input-icon fa fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Your Organization</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control" type="text" placeholder="Enter Your Organization">
                                                                    <i class="fs-input-icon fa fa-building"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Is this your current company?</label>
                                                                <div class="row twm-form-radio-inline">

                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                                            Yes
                                                                        </label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="S_no" checked>
                                                                        <label class="form-check-label" for="S_no">
                                                                            No
                                                                        </label>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Start Date-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Started Working From</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--End Date-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Worked Till</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <label>Describe your Job Profile</label>
                                                                <textarea class="form-control" rows="3" placeholder="Describe your Job"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--Education-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Education</h4>
                                    <a data-bs-toggle="modal" href="#Education" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p>Mention your employment details including your current and previous company work experience</p>
                                        <p>2004 to 2006</p>
                                        <p><b>BCA - Bachelor of Computer Applications</b></p>
                                        <p>2006 to 2008</p>
                                        <p><b>MCA - Master of Computer Application</b></p>
                                        <p>2008 to 20011</p>
                                        <p><b>Design Communication Visual</b></p>
                                        <p><a class="site-text-primary" href="javascript:;">Add Doctorate/PhD</a></p>
                                        <p><a class="site-text-primary" href="javascript:;">Add Masters/Post-Graduation</a></p>
                                        <p><a class="site-text-primary" href="javascript:;">Add Graduation/Diploma</a></p>
                                    </div>
                                </div>

                                <!--Education -->
                                <div class="modal fade twm-saved-jobs-view" id="Education" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Education</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">

                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Education</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title="" data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option>Graduation/Diploma</option>
                                                                        <option>Masters/Post-Graduation</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-user-graduate"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Course</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Course</option>
                                                                        <option>BBA- Bachelor of Business Administration</option>
                                                                        <option>BFA- Bachelor of Fine Arts</option>
                                                                        <option>BSW- Bachelor of Social Work</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-book"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>University/Institute</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select University</option>
                                                                        <option>University of Cambridge</option>
                                                                        <option>Stanford University</option>
                                                                        <option>Imperial College London</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fas fa-book-reader"></i>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--IT Skills-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">IT Skills</h4>
                                    <a data-bs-toggle="modal" href="#IT_skills" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p>Mention your employment detail including your current and previous company work experience</p>
                                        <div class="table-responsive">
                                            <table class="table twm-table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Skills</th>
                                                    <th>Version</th>
                                                    <th>Last Used</th>
                                                    <th>Experience</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <!--1-->
                                                <tr>
                                                    <td>Python</td>
                                                    <td>13</td>
                                                    <td>2020</td>
                                                    <td>1 Year</td>
                                                    <td>
                                                        <a data-bs-toggle="modal" href="#IT_skills" role="button" title="Edit" class="site-text-primary">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!--2-->
                                                <tr>
                                                    <td>Bootstrap</td>
                                                    <td>5</td>
                                                    <td>2021</td>
                                                    <td>1 Year</td>
                                                    <td>
                                                        <a data-bs-toggle="modal" href="#IT_skills" role="button" title="Edit" class="site-text-primary">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!--3-->
                                                <tr>
                                                    <td>HTML</td>
                                                    <td>5</td>
                                                    <td>2020</td>
                                                    <td>1 Year</td>
                                                    <td>
                                                        <a data-bs-toggle="modal" href="#IT_skills" role="button" title="Edit" class="site-text-primary">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!--4-->
                                                <tr>
                                                    <td>Photoshop</td>
                                                    <td>CC-2023</td>
                                                    <td>2023</td>
                                                    <td>1 Year</td>
                                                    <td>
                                                        <a data-bs-toggle="modal" href="#IT_skills" role="button" title="Edit" class="site-text-primary">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!--5-->
                                                <tr>
                                                    <td>Css</td>
                                                    <td>3</td>
                                                    <td>2018</td>
                                                    <td>1 Year</td>
                                                    <td>
                                                        <a data-bs-toggle="modal" href="#IT_skills" role="button" title="Edit" class="site-text-primary">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!--IT_skills -->
                                <div class="modal fade twm-saved-jobs-view" id="IT_skills" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">IT Skills</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>IT Skills</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control"  type="text" placeholder="Enter IT Skills">
                                                                    <i class="fs-input-icon fa fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Version</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control"  type="text" placeholder="Enter Version">
                                                                    <i class="fs-input-icon fa fa-info"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Last Used</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option>2021</option>
                                                                        <option>2020</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Experience year</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option>2021</option>
                                                                        <option>2020</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-user-edit"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-12 col-md-12">
                                                            <div class="form-group">
                                                                <label>Month</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option>January</option>
                                                                        <option>February</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-user-edit"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--Project-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Project</h4>
                                    <a data-bs-toggle="modal" href="#Pro_ject" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p><b>Jobzilla</b></p>
                                        <p>Google INC</p>
                                        <p>January 2023 to Present</p>
                                        <p>Jobjilla Template</p>
                                    </div>
                                </div>

                                <!--Project -->
                                <div class="modal fade twm-saved-jobs-view" id="Pro_ject" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Add Project</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Project Title</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control"  type="text" placeholder="Enter Project Title">
                                                                    <i class="fs-input-icon fa fa-address-card"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Education</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option>Graduation/Diploma</option>
                                                                        <option>Masters/Post-Graduation</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-user-graduate"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Client</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control" type="text" placeholder="Enter Client Name">
                                                                    <i class="fs-input-icon fa fa-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Project Status</label>
                                                                <div class="row twm-form-radio-inline">

                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="In_Progress">
                                                                        <label class="form-check-label" for="In_Progress">
                                                                            In Progress
                                                                        </label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="Finished" checked>
                                                                        <label class="form-check-label" for="Finished">
                                                                            Finished
                                                                        </label>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Start Date-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Started Working From</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--End Date-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Worked Till</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-0">
                                                                <label>Detail of Projects</label>
                                                                <textarea class="form-control" rows="3" placeholder="Describe your Job"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--Desired Career Profile-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Desired Career Profile</h4>
                                    <a data-bs-toggle="modal" href="#Desired_Career" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Industry</div>
                                                    <span class="twm-s-info-discription">IT-Software/Software Services</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Functional Area</div>
                                                    <span class="twm-s-info-discription">Design / Creative / User Experience</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Role</div>
                                                    <span class="twm-s-info-discription">Web Designer</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Job Type</div>
                                                    <span class="twm-s-info-discription">permanent</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Employment Type</div>
                                                    <span class="twm-s-info-discription">Full Time</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Desired Shift</div>
                                                    <span class="twm-s-info-discription">Add Desired Shift</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Availability to Join</div>
                                                    <span class="twm-s-info-discription">06 August</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Expected Salary</div>
                                                    <span class="twm-s-info-discription">1 Lakhs</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Desired Location</div>
                                                    <span class="twm-s-info-discription">Add Desired Location</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Desired Industry</div>
                                                    <span class="twm-s-info-discription">Add Desired Industry</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--Desired Career Profile -->
                                <div class="modal fade twm-saved-jobs-view" id="Desired_Career" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Desired Career Profile</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="row">
                                                        <!--Industry-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Industry</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option>Accounting / Finance</option>
                                                                        <option>Banking / Financial Services / Broking</option>
                                                                        <option>Education / Teaching / Training</option>
                                                                        <option>IT-Hardware / Networking</option>
                                                                        <option>Other</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-industry"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Functional Area / Department-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Functional Area / Department</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option>Agent</option>
                                                                        <option>Architecture / Interior Design</option>
                                                                        <option>Beauty / Fitness / Spa Services</option>
                                                                        <option>IT Hardware / Technical Support</option>
                                                                        <option>IT Software - System Programming</option>
                                                                        <option>Other</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-building"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Role-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Role</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option>Creative</option>
                                                                        <option>Web Designer</option>
                                                                        <option>Graphic Designer</option>
                                                                        <option>National Creative Director</option>
                                                                        <option>Fresher</option>
                                                                        <option>Other</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Job Type-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Job Type</label>
                                                                <div class="row twm-form-radio-inline">

                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="Permanent">
                                                                        <label class="form-check-label" for="Permanent">
                                                                            Permanent
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="Contractual" checked>
                                                                        <label class="form-check-label" for="Contractual">
                                                                            Contractual
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Employment Type-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Employment Type</label>
                                                                <div class="row twm-form-radio-inline">

                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="Full_Time">
                                                                        <label class="form-check-label" for="Full_Time">
                                                                            Full Time
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="part_Time" checked>
                                                                        <label class="form-check-label" for="part_Time">
                                                                            Part Time
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Preferred Shift-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Preferred Shift</label>
                                                                <div class="row twm-form-radio-inline">

                                                                    <div class="col-md-4">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="S_day">
                                                                        <label class="form-check-label" for="S_day">
                                                                            Day
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="S_night" checked>
                                                                        <label class="form-check-label" for="S_night">
                                                                            Night
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="s_part_time" checked>
                                                                        <label class="form-check-label" for="s_part_time">
                                                                            Part Time
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                         <!--Availability to join-->
                                                         <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Availability to Join</label>
                                                                <div class="ls-inputicon-box">
                                                                    <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                    <i class="fs-input-icon far fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Expected Salary-->
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Expected Salary</label>
                                                                <div class="row twm-form-radio-inline">

                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="US_Dollars">
                                                                        <label class="form-check-label">
                                                                            US Dollars
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input class="form-check-input" type="radio" name="US_Dollars" id="indian_rpees" checked>
                                                                        <label class="form-check-label" for="indian_rpees">
                                                                            Indian Rupees
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Lakh</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option>0 lakh</option>
                                                                        <option>1 lakh</option>
                                                                        <option>2 lakh</option>
                                                                        <option>5 lakh</option>
                                                                        <option>4 lakh</option>
                                                                        <option>5 lakh</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-dollar-sign"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label>Thousand</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Select Category</option>
                                                                        <option> 05 Thousand </option>
                                                                        <option> 10 Thousand </option>
                                                                        <option> 15 Thousand </option>
                                                                        <option> 20 Thousand </option>
                                                                        <option> 25 Thousand </option>
                                                                        <option> 30 Thousand </option>
                                                                        <option> 35 Thousand </option>
                                                                        <option> 40 Thousand </option>
                                                                        <option> 45 Thousand </option>
                                                                        <option> 50 Thousand </option>
                                                                        </select>
                                                                    <i class="fs-input-icon fa fa-dollar-sign"></i>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Desired Location</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Country</option>
                                                                        <option>India</option>
                                                                        <option>Australia</option>
                                                                        <option>Bahrain</option>
                                                                        <option>China</option>
                                                                        <option>Dubai</option>
                                                                        <option>France</option>
                                                                        <option>Germany</option>
                                                                        <option>Hong Kong</option>
                                                                        <option>Kuwait</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="form-group mb-0">
                                                                <label>Desired Industry</label>
                                                                <div class="ls-inputicon-box">
                                                                    <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                        <option class="bs-title-option" value="">Country</option>
                                                                        <option>Software</option>
                                                                        <option>Factory</option>
                                                                        <option>Ngo</option>
                                                                        <option>Other</option>
                                                                    </select>
                                                                    <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--Personal Details-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Personal Details</h4>
                                    <a data-bs-toggle="modal" href="#Personal_Details" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Date of Birth</div>
                                                    <span class="twm-s-info-discription">31 July 1998</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Permanent Address</div>
                                                    <span class="twm-s-info-discription">Add Permanent Address</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Gender</div>
                                                    <span class="twm-s-info-discription">Male</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Area Pin Code</div>
                                                    <span class="twm-s-info-discription">302021</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Marital Status</div>
                                                    <span class="twm-s-info-discription">Single / unmarried</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Hometown</div>
                                                    <span class="twm-s-info-discription">USA</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Passport Number</div>
                                                    <span class="twm-s-info-discription">+123 456 7890</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Work permit of other country</div>
                                                    <span class="twm-s-info-discription">UK</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Differently Abled</div>
                                                    <span class="twm-s-info-discription">None</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="twm-s-detail-section">
                                                    <div class="twm-title">Languages</div>
                                                    <span class="twm-s-info-discription">English</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--Personal Details Modal -->
                                <div class="modal fade twm-saved-jobs-view" id="Personal_Details" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Personal Detail</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">

                                                        <div class="row">
                                                            <!--Birth Date-->
                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                        <i class="fs-input-icon far fa-calendar"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <div class="row twm-form-radio-inline">

                                                                        <div class="col-md-6">
                                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="S_male">
                                                                            <label class="form-check-label" for="S_male">
                                                                              Male
                                                                            </label>
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="S_female" checked>
                                                                            <label class="form-check-label" for="S_female">
                                                                              Female
                                                                            </label>
                                                                          </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Permanent Address</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <input class="form-control"  type="text" placeholder="Enter Permanent Address">
                                                                        <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Hometown</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <input class="form-control"  type="text" placeholder="Enter Hometown">
                                                                        <i class="fs-input-icon fa fa-map-marker-alt"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Pincode</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <input class="form-control"  type="text" placeholder="Enter Pincode">
                                                                        <i class="fs-input-icon fa fa-map-pin"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Marital Status</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                            <option class="bs-title-option" value="">Select Category</option>
                                                                            <option>Married</option>
                                                                            <option>Single</option>
                                                                        </select>
                                                                        <i class="fs-input-icon fa fa-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Passport Number</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <input class="form-control" type="text" placeholder="Enter Passport Number">
                                                                        <i class="fs-input-icon fa fa-star-of-life"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>What assistance do you need</label>
                                                                    <textarea class="form-control" rows="3" placeholder="Describe"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12">
                                                                <div class="form-group mb-0">
                                                                    <label>Work Permit for Other Countries</label>
                                                                    <div class="ls-inputicon-box">
                                                                        <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
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

                                                        </div>


                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--Attach Resume-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Attach Resume</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p>Resume is the most important document recruiters look for. Recruiters generally do not look at profiles without resumes.</p>
                                        <div class="dashboard-cover-pic">
                                            <form action="https://thewebmax.org/jobzilla/upload.php" class="dropzone"></form>
                                            <p>Upload Resume File size is 3 MB</p>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!--Accomplishments-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Accomplishments</h4>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <div class="twm-list-wrap">
                                            <div class="twm-list-inner d-flex justify-content-between">
                                                <b>Online Profile</b>
                                                <a data-bs-toggle="modal" href="#Online_Profile" role="button" title="Edit" class="site-text-primary">
                                                 <span class="fa fa-edit"></span>
                                                </a>
                                            </div>
                                            <p>Add link to Online profiles (e.g. Linkedin, Facebook etc.).</p>
                                        </div>
                                        <!--Online Profile Modal -->
                                        <div class="modal fade twm-saved-jobs-view" id="Online_Profile" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form>

                                                        <div class="modal-header">
                                                            <h2 class="modal-title">Online Profiles</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Social Profile</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Social Profile Name">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Url">
                                                                            <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-0">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" rows="3" placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="site-button">Save</button>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="twm-list-wrap">
                                            <div class="twm-list-inner d-flex justify-content-between">
                                                <b>Work Sample</b>
                                                <a data-bs-toggle="modal" href="#Work_Sample" role="button" title="Edit" class="site-text-primary">
                                                 <span class="fa fa-edit"></span>
                                                </a>
                                            </div>
                                            <p>Add link to your Projects (e.g. Github links etc.).</p>
                                        </div>
                                        <!--Work Sample Modal -->
                                        <div class="modal fade twm-saved-jobs-view" id="Work_Sample" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form>

                                                        <div class="modal-header">
                                                            <h2 class="modal-title">Work Sample</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Work Title</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Work Title">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Url">
                                                                            <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <!--Start Date-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Duration From</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                            <i class="fs-input-icon far fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--End Date-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Duration to</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                            <i class="fs-input-icon far fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="Working_on" checked>
                                                                        <label class="form-check-label" for="Working_on">
                                                                            I am currently working on this
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-0">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" rows="3" placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="site-button">Save</button>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="twm-list-wrap">
                                            <div class="twm-list-inner d-flex justify-content-between">
                                                <b>White Paper / Research Publication / Journal Entry</b>
                                                <a data-bs-toggle="modal" href="#Research_Publication" role="button" title="Edit" class="site-text-primary">
                                                 <span class="fa fa-edit"></span>
                                                </a>
                                            </div>
                                            <p>Add links to your Online publications.</p>
                                        </div>
                                        <!--White Paper / Research Publication / Journal Entry Modal -->
                                        <div class="modal fade twm-saved-jobs-view" id="Research_Publication" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form>

                                                        <div class="modal-header">
                                                            <h2 class="modal-title">White Paper / Research Publication / Journal Entry</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Title">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Url">
                                                                            <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <!--Start Date-->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Published On</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                            <i class="fs-input-icon far fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-0">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" rows="3" placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="site-button">Save</button>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="twm-list-wrap">
                                            <div class="twm-list-inner d-flex justify-content-between">
                                                <b>Presentation</b>
                                                <a data-bs-toggle="modal" href="#Presentation_modal" role="button" title="Edit" class="site-text-primary">
                                                 <span class="fa fa-edit"></span>
                                                </a>
                                            </div>
                                            <p>Add links to your Online presentations (e.g. Slideshare presentation links etc.).</p>
                                        </div>
                                        <!--Presentation Modal -->
                                        <div class="modal fade twm-saved-jobs-view" id="Presentation_modal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form>

                                                        <div class="modal-header">
                                                            <h2 class="modal-title">Presentation</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Social Profile</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Social Profile Name">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>URL</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Url">
                                                                            <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-0">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" rows="3" placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="site-button">Save</button>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="twm-list-wrap">
                                            <div class="twm-list-inner d-flex justify-content-between">
                                                <b>Certification</b>
                                                <a data-bs-toggle="modal" href="#Certification_modal" role="button" title="Edit" class="site-text-primary">
                                                 <span class="fa fa-edit"></span>
                                                </a>
                                            </div>
                                            <p>Add details of Certification you have filed.</p>
                                        </div>
                                        <!--Certification Modal -->
                                        <div class="modal fade twm-saved-jobs-view" id="Certification_modal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form>

                                                        <div class="modal-header">
                                                            <h2 class="modal-title">Certification</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Certification Name</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Certification Name">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Certification Body</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Certification Body">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group mb-0">
                                                                        <label>Year Onlabel</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <select class="wt-select-box selectpicker"  data-live-search="true" title=""  data-bv-field="size">
                                                                                <option class="bs-title-option" value="">Year</option>
                                                                                <option>2021</option>
                                                                                <option>2020</option>
                                                                                <option>2019</option>
                                                                                <option>2018</option>
                                                                                <option>2017</option>
                                                                                <option>2016</option>
                                                                                <option>2015</option>
                                                                                <option>2014</option>
                                                                                <option>2013</option>
                                                                                <option>2012</option>
                                                                                <option>2011</option>
                                                                            </select>
                                                                            <i class="fs-input-icon fa fa-calendar-alt"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="site-button">Save</button>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="twm-list-wrap">
                                            <div class="twm-list-inner d-flex justify-content-between">
                                                <b>Patent</b>
                                                <a data-bs-toggle="modal" href="#Patent_modal" role="button" title="Edit" class="site-text-primary">
                                                 <span class="fa fa-edit"></span>
                                                </a>
                                            </div>
                                            <p>Add details of Patents you have filed.</p>
                                        </div>
                                        <!--Patent Modal -->
                                        <div class="modal fade twm-saved-jobs-view" id="Patent_modal" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form>

                                                        <div class="modal-header">
                                                            <h2 class="modal-title">Patent</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Title">
                                                                            <i class="fs-input-icon fa fa-address-card"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Url</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Url ">
                                                                            <i class="fs-input-icon fa fa-globe-americas"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Patent Office</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Patent Office">
                                                                            <i class="fs-input-icon fa fa-building"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Application Number</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control"  type="text" placeholder="Enter Application Number">
                                                                            <i class="fs-input-icon fa fa-dice-d6"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xl-12 col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <div class="row twm-form-radio-inline">

                                                                            <div class="col-md-6">
                                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="Patent_Issued">
                                                                                <label class="form-check-label" for="Patent_Issued">
                                                                                    Patent Issued
                                                                                </label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="Patent_pending" checked>
                                                                                <label class="form-check-label" for="Patent_pending">
                                                                                    Patent pending
                                                                                </label>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!--Start Date-->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Published On</label>
                                                                        <div class="ls-inputicon-box">
                                                                            <input class="form-control datepicker" data-provide="datepicker" name="company_since" type="text" placeholder="mm/dd/yyyy">
                                                                            <i class="fs-input-icon far fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group mb-0">
                                                                        <label>Description</label>
                                                                        <textarea class="form-control" rows="3" placeholder="Type Description"></textarea>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="site-button">Save</button>

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>



                            </div>

                            <!--Profile Summary-->
                            <div class="panel panel-default mb-3">
                                <div class="panel-heading wt-panel-heading p-a20 panel-heading-with-btn ">
                                    <h4 class="panel-tittle m-a0">Profile Summary</h4>
                                    <a data-bs-toggle="modal" href="#Profile_Summary" role="button" title="Edit" class="site-text-primary">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </div>
                                <div class="panel-body wt-panel-body p-a20 ">
                                    <div class="twm-panel-inner">
                                        <p>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</p>
                                    </div>
                                </div>
                                <!--Modal Popup -->
                                <div class="modal fade twm-saved-jobs-view" id="Profile_Summary" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form>

                                                <div class="modal-header">
                                                    <h2 class="modal-title">Profile Summary</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Your Profile Summary should mention the highlights of your career and education, what your professional interests are, and what kind of a career you are looking for. Write a meaningful summary of more than 50 characters.</p>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group twm-textarea-full">
                                                                <textarea class="form-control" placeholder="Detail of Project"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="site-button" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="site-button">Save</button>

                                                </div>

                                            </form>
                                        </div>
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
