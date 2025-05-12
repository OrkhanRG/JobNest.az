<div class="modal fade twm-sign-up" id="reset_password_popup" aria-hidden="true" aria-labelledby="reset_password_popupLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div>
                <div class="modal-header">
                    <h2 class="modal-title" id="sign_up_popupLabel2">Şifrə Dəyişdir</h2>
                    <p>Şifrə sıfırlamaq üçün aşağıdakı sahələri doldurun.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="twm-tabs-style-2">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="email">Şifrə</label><small class="text-danger">*</small>
                                    <input name="password" id="password" data-role="password" type="password" required class="form-control" placeholder="***********">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="email">Şifrə Təkrar</label><small class="text-danger">*</small>
                                    <input name="password_confirmation" id="password_confirmation" data-role="password_confirmation" type="password" required class="form-control" placeholder="***********">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button data-role="btn-reset-password" class="site-button">Şifrəni Sıfırla</button>
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
