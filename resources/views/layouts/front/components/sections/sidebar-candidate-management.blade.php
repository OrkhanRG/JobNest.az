<div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">

    <div class="side-bar-st-1">

        <div class="twm-candidate-profile-pic">

            <img src="{{ asset("assets/images/user-avtar/pic4.jpg") }}" alt="">
            <div class="upload-btn-wrapper">

                <div id="upload-image-grid"></div>
                <button class="site-button button-sm">Upload Photo</button>
                <input type="file" name="myfile" id="file-uploader" accept=".jpg, .jpeg, .png">
            </div>

        </div>
        <div class="twm-mid-content text-center">
            <a href="{{ route("front.candidate", "orxan-ismayilov") }}" class="twm-job-title">
                <h4>{{ auth()->user()->name }} {{ auth()->user()->surname ?? "" }} </h4>
            </a>
            <p>Back-End Developer</p>
        </div>

        <div class="twm-nav-list-1">
            <ul>
                <li class="{{ Route::is("front.candidate.dashboard") ? "active" : "" }}"><a href="{{ route("front.candidate.dashboard") }}"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="{{ Route::is("front.candidate.profile") ? "active" : "" }}"><a href="{{ route("front.candidate.profile") }}"><i class="fa fa-user"></i> My Pfofile</a></li>
                <li class="{{ Route::is("front.candidate.applied-jobs") ? "active" : "" }}"><a href="{{ route("front.candidate.applied-jobs") }}"><i class="fa fa-suitcase"></i> Applied Jobs</a></li>
                <li class="{{ Route::is("front.candidate.my-resume") ? "active" : "" }}"><a href="{{ route("front.candidate.my-resume") }}"><i class="fa fa-receipt"></i> My Resume</a></li>
                <li class="{{ Route::is("front.candidate.saved-jobs") ? "active" : "" }}"><a href="{{ route("front.candidate.saved-jobs") }}"><i class="fa fa-file-download"></i> Saved Jobs</a></li>
                <li class="{{ Route::is("front.candidate.cv-manager") ? "active" : "" }}"><a href="{{ route("front.candidate.cv-manager") }}"><i class="fa fa-paperclip"></i> CV Manager</a></li>
                <li class="{{ Route::is("front.candidate.job-alerts") ? "active" : "" }}"><a href="{{ route("front.candidate.job-alerts") }}"><i class="fa fa-bell"></i> Job Alerts</a></li>
                <li class="{{ Route::is("front.candidate.change-password") ? "active" : "" }}"><a href="{{ route("front.candidate.change-password") }}"><i class="fa fa-fingerprint"></i> Change Passeord</a></li>
                <li class="{{ Route::is("front.candidate.chat") ? "active" : "" }}"><a href="{{ route("front.candidate.chat") }}"><i class="fa fa-comments"></i>Chat</a></li>
                <li><a data-role="logout" href="{{ route("logout") }}"><i class="fa fa-share-square"></i> Çıxış</a></li>
            </ul>
        </div>

    </div>

</div>
