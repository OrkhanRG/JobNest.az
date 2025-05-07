<div class="modal fade twm-sign-up" id="sign_up_popup" aria-hidden="true" aria-labelledby="sign_up_popupLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div>

                <div class="modal-header">
                    <h2 class="modal-title" id="sign_up_popupLabel">Qeydiyyat</h2>
                    <p>Qeydiyyatdan keçin və JobNest-in bütün xüsusiyyətlərinə giriş əldə edin</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="twm-tabs-style-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <!--Signup Candidate-->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#sign-candidate" type="button"><i class="fas fa-user-tie"></i>Namizəd</button>
                        </li>
                        <!--Signup Employer-->
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sign-company" type="button"><i class="fas fa-building"></i>Şirkət</button>
                        </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <!--Signup Candidate Content-->
                        <div class="tab-pane fade show active" id="sign-candidate">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Ad</label><small class="text-danger">*</small>
                                        <input name="name" id="name" data-role="name" type="text" required="" class="form-control" placeholder="Adınız">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="surname">Soyad</label><small class="text-danger">*</small>
                                        <input name="surname" id="surname" data-role="surname" type="text" required="" class="form-control" placeholder="Soyadınız">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label><small class="text-danger">*</small>
                                        <input name="email" id="email" data-role="email" type="email" class="form-control" required="" placeholder="XXXX@XXX.XX">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Şifrə</label><small class="text-danger">*</small>
                                        <input type="password" id="password" name="password" data-role="password" class="form-control" required="" placeholder="********">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Şifrə Təkrar</label><small class="text-danger">*</small>
                                        <input type="password" id="password_confirmation" name="password_confirmation" data-role="password_confirmation" class="form-control" required="" placeholder="********">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <div class=" form-check">
                                            @if(true)
                                                <input type="checkbox" class="form-check-input" id="agree1">
                                                <label class="form-check-label" for="agree1"><a href="javascript:void(0);">Qaydalar və şərtlərlə</a> razıyam</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" data-user-type="candidate" data-role="register-candidate" class="site-button">Qeydiyyatdan keçin</button>
                                    <div class="mt-3 mb-3">Mövcud hesabınız var?
                                        <button class="twm-backto-login" data-bs-target="#sign_up_popup2" data-bs-toggle="modal" data-bs-dismiss="modal">Daxil olun</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--Signup Employer Content-->
                        <div class="tab-pane fade" id="sign-company">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="name">Şirkət Adı</label><small class="text-danger">*</small>
                                        <input name="name" id="name" data-role="name" type="text" required="" class="form-control" placeholder="Şirkət Adı">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label><small class="text-danger">*</small>
                                        <input name="email" id="email" data-role="email" type="email" class="form-control" required="" placeholder="XXXX@XXX.XX">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <label for="phone">Telefon</label>
                                        <input name="phone" id="phone" data-role="phone" type="text" class="form-control" placeholder="+994-(XX)-XXX-XX-XX">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="password">Şifrə</label><small class="text-danger">*</small>
                                        <input name="password" id="password" data-role="password" type="password" class="form-control" required="" placeholder="********">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation">Şifrə Təkrar</label><small class="text-danger">*</small>
                                        <input name="password_confirmation" id="password_confirmation" data-role="password_confirmation" type="password" class="form-control" required="" placeholder="********">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group mb-3">
                                        <div class=" form-check">
                                            @if(false)
                                                <input type="checkbox" class="form-check-input" id="agree1">
                                                <label class="form-check-label" for="agree1"><a href="javascript:;">Qaydalar və şərtlərlə</a> razıyam</label>
                                            @endif
                                            <p>Mövcud hesabınız var?
                                                <button class="twm-backto-login" data-bs-target="#sign_up_popup2" data-bs-toggle="modal" data-bs-dismiss="modal">Bura daxil olun</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" data-role="register-company" data-user-type="company" class="site-button">Qeydiyyatdan keçin</button>
                                </div>

                            </div>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <span class="modal-f-title">Bir kliklə Daxil Ol & Qeydiyyatdan Keç</span>
                    <ul class="twm-modal-social">
                        <li><a href="{{ route("oauth.redirect", "google") }}" class="google-clr"><i class="fab fa-google"></i></a></li>
                        <li><a href="{{ route("oauth.redirect", "github") }}" class="github-clr"><i class="fab fa-github"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>
