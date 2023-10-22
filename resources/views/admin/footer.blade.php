
</div>
<!-- END layout-wrapper -->

<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('admin/js/plugins.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('admin/libs/apexcharts/apexcharts.min.js')}}"></script>
<!-- Vector map-->
<script src="{{asset('admin/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('admin/libs/jsvectormap/maps/world-merc.js')}}"></script>
<!--Swiper slider js-->
<script src="{{asset('admin/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- Dashboard init -->
<script src="{{asset('admin/js/pages/dashboard-ecommerce.init.js')}}"></script>
<!-- App js -->
{{-- <script src="{{asset('admin/js/app.js')}}"></script> --}}
<!-- Toastr -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async></script> --}}

<!-- prismjs plugin -->
<script src="{{asset('admin/libs/prismjs/prism.js')}}"></script>
<script src="{{asset('admin/libs/list.js/list.min.js')}}"></script>
<script src="{{asset('admin/libs/list.pagination.js/list.pagination.min.js')}}"></script>

<!-- listjs init -->
<script src="{{asset('admin/js/pages/listjs.init.js')}}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@include('admin.ajax')

</body>
</html>