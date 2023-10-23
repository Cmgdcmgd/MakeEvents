<footer class="footer-wrapper">
    <div class="footer-container container">
        <div class="footer-column three columns" id="footer-widget-1">
            <div id="text-5" class="widget widget_text gdlr-item gdlr-widget">
                <h3 class="gdlr-widget-title">Book Now!</h3>
                <div class="clear"></div>
                <div class="textwidget">
                    <p><i class="gdlr-icon fa fa-phone" style="color: #fff; font-size: 16px; "></i> 09136549587</p>
                    <div class="clear"></div>
                    <div class="gdlr-space" style="margin-top: -15px;"></div>
                    <p><i class="gdlr-icon fa fa-envelope-o" style="color: #fff; font-size: 16px; "></i>makeeventsmemorable.com</p>
                    <div class="clear"></div>
                    <div class="gdlr-space" style="margin-top: 25px;"></div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-column six columns" id="footer-widget-3">
            <div id="text-10" class="widget widget_text gdlr-item gdlr-widget">
                <h3 class="gdlr-widget-title">Our Mision</h3>
                <div class="clear"></div>
                <div class="textwidget">
                    <div class="clear"></div>
                    <div class="gdlr-space"></div>
                    Our mission is to connect companies with world-class talent with the vision to build a global family that aspires to reach its highest potential.</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</footer>
</div>
<!-- body-wrapper -->
<script type='text/javascript' src="{{asset('mainpage/js/jquery/jquery.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/jquery/jquery-migrate.min.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/jquery/ui/core.min.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/jquery/ui/datepicker.min.js')}}"></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var objectL10n = {
        "closeText": "Done",
        "currentText": "Today",
        "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        "monthNamesShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        "monthStatus": "Show a different month",
        "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
        "firstDay": "1"
    };
    /* ]]> */
</script>
<script type='text/javascript' src="{{asset('mainpage/plugins/gdlr-hostel/gdlr-hotel.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/superfish/js/superfish.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/hoverIntent.min.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/dl-menu/modernizr.custom.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/dl-menu/jquery.dlmenu.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/jquery.easing.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/jquery.transit.min.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/fancybox/helpers/jquery.fancybox-media.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/fancybox/helpers/jquery.fancybox-thumbs.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/flexslider/jquery.flexslider.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/jquery.isotope.min.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/js/gdlr-script.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/gdlr-portfolio/gdlr-portfolio-script.js')}}"></script>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?libraries=geometry%2Cplaces%2Cweather%2Cpanoramio%2Cdrawing&#038;language=en&#038;ver=d28e0394762e5fb1bc6362945d147c2c'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wpgmp_local = {
            "all_location": "All",
            "show_locations": "Show Locations",
            "sort_by": "Sort by",
            "wpgmp_not_working": "not working...",
            "place_icon_url": "https:\/\/demo.goodlayers.com\/hotelmaster\/wp-content\/plugins\/wp-google-map-plugin\/assets\/images\/icons\/"
        };
        /* ]]> */
    </script>

<script type='text/javascript' src="{{asset('mainpage/plugins/google-map-plugin/assets/js/maps.js')}}"></script>
<script type='text/javascript' src="{{asset('mainpage/plugins/google-map-plugin/assets/js/frontend.js')}}"></script> 
<script type='text/javascript' src="{{asset('mainpage/plugins\masterslider\public\assets\js\masterslider.min.js')}}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @if(session()->has('message'))
        toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session()->get('message') }}");
    @endif

    $('#try').click(function(e){
        Swal.fire({
            title: 'Are you sure?',
            text: "Reserve this event venue now?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, book it!'
        }).then((willBook) => {
            if(willBook.isConfirmed) {
                Swal.fire(
                    'Booked!',
                    'Venue has been booked. Please check your email for payment instructions.',
                    'success'
                ).then((confirmbook) => {
                    var form = $(this).closest("form");
                    form.submit();
                });
            }
        })
    });

    
        
</script>

</body>
</html>