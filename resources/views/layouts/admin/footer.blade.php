<!-- ========== Footer Start ========== -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                {{ date("Y") }}
                &copy; JobNest Management. Crafted by
                <iconify-icon
                    icon="iconamoon:heart-duotone"
                    class="fs-18 align-middle text-danger"
                ></iconify-icon>
                <a href="javascript:void(0)" class="fw-bold footer-text">JobNest</a>
            </div>
        </div>
    </div>
</footer>
<!-- ========== Footer End ========== -->

</div>
<!-- ==================================================== -->
<!-- End Page Content -->
<!-- ==================================================== -->
</div>
<!-- END Wrapper -->

<!-- Vendor Javascript (Require in all Page) -->
<script src="{{ asset("assets/admin/js/vendor.js") }}"></script>

<!-- jQuery -->
<script src="{{ asset("assets/admin/js/jquery-3.6.0.min.js") }}"></script>
<script src="{{ asset("assets/admin/js/select2.min.js") }}"></script>

<!-- App Javascript (Require in all Page) -->
<script src="{{ asset("assets/admin/js/app.js") }}"></script>

<script  src="{{ asset("assets/global/js/helper.js") }}"></script>
<script  src="{{ asset("assets/global/js/default.js") }}"></script>
<script  src="{{ asset("assets/admin/custom/js/helper.js") }}"></script>
<script src="{{ asset("assets/admin/custom/js/default.js") }}"></script>
<script src="{{ asset("assets/admin/custom/library/ajax-timer.js") }}"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $(`meta[name="csrf-token"]`).attr("content")
            }
        })
    });
</script>
@stack("js")

</body>
</html>
