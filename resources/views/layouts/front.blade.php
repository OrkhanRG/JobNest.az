<!-- HEADER START -->
@include("layouts.front.header")
<!-- HEADER END -->

        <!-- CONTENT START -->
        <div class="page-content">
            @yield("contents")
        </div>
        <!-- CONTENT END -->

        <!--Model Popup Section Start-->
            <!--Signup popup -->
            @include("layouts.front.components.signup-popup")
            <!--Login popup -->
            @include("layouts.front.components.login-popup")
            <!--Forgot password popup -->
            @include("layouts.front.components.forgot-password-popup")

        <!--Model Popup Section End-->

<!-- FOOTER START -->
@include("layouts.front.footer")
<!-- FOOTER END -->
