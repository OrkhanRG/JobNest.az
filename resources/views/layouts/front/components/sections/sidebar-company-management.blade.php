<div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">

    <div class="side-bar-st-1">

        <div class="twm-candidate-profile-pic">

            <img src="{{ asset("assets/images/jobs-company/pic1.jpg") }}" alt="">
            <div class="upload-btn-wrapper">

                <div id="upload-image-grid"></div>
                <button class="site-button button-sm">Upload Photo</button>
                <input type="file" name="myfile" id="file-uploader" accept=".jpg, .jpeg, .png">
            </div>

        </div>

        <div class="twm-mid-content text-center">
            <a href="candidate-detail.html" class="twm-job-title">
                <h4>Artistre Studio PVT Ltd</h4>
            </a>
            <p>IT Contractor</p>
        </div>

        <div class="twm-nav-list-1">
            <ul>
                <li class="{{ Route::is("front.company.dashboard") ? "active" : "" }}"><a href="{{ route("front.company.dashboard") }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="{{ Route::is("front.company.profile") ? "active" : "" }}"><a href="{{ route("front.company.profile") }}"><i class="fa fa-user"></i> Company Profile</a></li>
                <li class="{{ Route::is("front.company.resume") ? "active" : "" }}"><a href="{{ route("front.company.resume") }}"><i class="fa fa-receipt"></i> Resume</a></li>
                <li class="{{ Route::is("front.company.manage-jobs") ? "active" : "" }}"><a href="{{ route("front.company.manage-jobs") }}"><i class="fa fa-suitcase"></i> Manage Jobs</a></li>
                <li class="{{ Route::is("front.company.post-job") ? "active" : "" }}"><a href="{{ route("front.company.post-job") }}"><i class="fa fa-book-reader"></i> Post A Jobs</a></li>
                <li class="{{ Route::is("front.company.transaction") ? "active" : "" }}"><a href="{{ route("front.company.transaction") }}"><i class="fa fa-credit-card"></i>Transaction</a></li>
                <li class="{{ Route::is("front.company.change-password") ? "active" : "" }}"><a href="{{ route("front.company.change-password") }}"><i class="fa fa-fingerprint"></i> Change Passeord</a></li>
                <li><a href="{{ route("logout") }}"><i class="fa fa-share-square"></i> Çıxış</a></li>
            </ul>
        </div>

    </div>

</div>
