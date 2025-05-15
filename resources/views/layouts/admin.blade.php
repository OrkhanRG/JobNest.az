@include("layouts.admin.header")
<!-- ========== Topbar Start ========== -->
@include("layouts.admin.components.navbar")
<!-- ========== Topbar End ========== -->

<!-- ========== App Menu Start ========== -->
@include("layouts.admin.components.sidebar")

<!-- ========== App Menu End ========== -->


<!-- ==================================================== -->
<!-- Start right Content here -->
<!-- ==================================================== -->
<div class="page-content">
    <!-- Start Container -->
    <div class="container-xxl">
        <!-- ========== Page Title Start ========== -->
        @yield("breadcrumb")
        <div class="row">
                @yield("contents")
        </div>
        <!-- ========== Page Title End ========== -->


        <!-- Start here.... -->
    </div>
    <!-- End Container -->
@include("layouts.admin.footer")
