<div class="col-xl-3 col-lg-4 col-md-12 rightSidebar m-b30">

    <div class="side-bar-st-1">

        <div class="twm-candidate-profile-pic">

            <img src="{{ asset("assets/front/images/jobs-company/pic1.jpg") }}" alt="">
            <div class="upload-btn-wrapper">

                <div id="upload-image-grid"></div>
                <button class="site-button button-sm">Avatar yüklə</button>
                <input type="file" name="myfile" id="file-uploader" accept=".jpg, .jpeg, .png">
            </div>

        </div>

        <div class="twm-mid-content text-center">
            <a href="candidate-detail.html" class="twm-job-title">
                <h4>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h4>
            </a>
            <p>{{ strtoupper(auth()->user()->roles[0]->name) }}</p>
        </div>

        <div class="twm-nav-list-1">
            <ul>
                <li class="{{ Route::is("front.company.dashboard") ? "active" : "" }}"><a href="{{ route("front.company.dashboard") }}"><i class="fa fa-tachometer-alt"></i> Statistika</a></li>
                <li class="{{ Route::is("front.company.profile") ? "active" : "" }}"><a href="{{ route("front.company.profile") }}"><i class="fa fa-user"></i>Profil</a></li>
                <li class="{{ Route::is("front.company.resume") ? "active" : "" }}"><a href="{{ route("front.company.resume") }}"><i class="fa fa-receipt"></i>CV</a></li>
                <li class="{{ Route::is("front.company.manage-jobs") ? "active" : "" }}"><a href="{{ route("front.company.manage-jobs") }}"><i class="fa fa-suitcase"></i>Vakansiya İdarə Etmə</a></li>
                <li class="{{ Route::is("front.company.post-job") ? "active" : "" }}"><a href="{{ route("front.company.post-job") }}"><i class="fa fa-book-reader"></i> Yeni Vakansiya</a></li>
                <li class="{{ Route::is("front.company.transaction") ? "active" : "" }}"><a href="{{ route("front.company.transaction") }}"><i class="fa fa-credit-card"></i>Əməliyyatlar</a></li>
                <li class="{{ Route::is("front.company.change-password") ? "active" : "" }}"><a href="{{ route("front.company.change-password") }}"><i class="fa fa-fingerprint"></i> Şifrəni Dəyiş</a></li>
                <li><a href="{{ route("logout") }}"><i class="fa fa-share-square"></i> Çıxış</a></li>
            </ul>
        </div>

    </div>

</div>
