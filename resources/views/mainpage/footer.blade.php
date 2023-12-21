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
                    Our mission is to revolutionize the way social events are planned and organized. MakeEventsMemorable connects people who share common interests through virtual coordination. Meet and book your suppliers, as well as hire an event coordinator, to make your event the best and most unforgettable of your life. </div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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

    @if(session()->has('form_errors'))
        Swal.fire({
            icon: 'error',
            title: 'Error' ,
            text: "{{ session()->get('form_errors') }}",
            showCancelButton: false,
            showConfirmButton: true,
            allowOutsideClick: false,
        });
    @endif

    @if(session()->has('form_success'))
        Swal.fire({
            icon: 'success',
            title: 'Booked!' ,
            text: "{{ session()->get('form_success') }}",
            showCancelButton: false,
            showConfirmButton: true,
            allowOutsideClick: false,
        });
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

    $('#reserve_venue').click(function(e){
        var time_start = document.getElementById('time_start').value;
        var time_end = document.getElementById('time_end').value;
        var event_name = document.getElementById('event_name').value;
        var client_name = document.getElementById('client_name').value;
        var number_of_guests = document.getElementById('number_of_guests').value;

        if (
        time_start == null ||
        time_end == '' ||
        event_name == '' ||
        client_name == '' ||
        number_of_guests == ''
    ) {
        Swal.fire({
            icon: 'error',
            title: 'Kindly fill out missing fields. Thank you.',
            showCancelButton: false,
            showConfirmButton: true,
            allowOutsideClick: false,
        });
    } else {
        Swal.fire({
            title: 'Are you sure?',
            text: "Reserve this event venue now?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, book it!'
        }).then((willBook) => {
            
                    var form = $(this).closest("form");
                    form.submit();
            
        })
    }
       
    });
    $('.slick-slider').slick({
        arrows: true,
      });
    function showhide(elem) 
    {  
        var div = document.getElementById(elem.getAttribute("href").replace("#", ""));
        $('.hideAllClick').hide();
        
        if (div.style.display !== "none") {  
            div.style.display = "none";  
        }  
        else {  
            div.style.display = "block";
            $(".slick-slider").slick("refresh");
        }  
    }  
    const
    range = document.getElementById('maxcapacity'),
    rangeV = document.getElementById('rangeV'),
    setValue = ()=>{
        const
        newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
        newPosition = 10 - (newValue * 0.2);
        rangeV.innerHTML = `<span>${range.value}</span>`;
        rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
    };
    document.addEventListener("DOMContentLoaded", setValue);
    range.addEventListener('input', setValue);

    
    $(".multiple_selects").select2({
        tags: true,
        allowClear: true,
        tokenSeparators: [','],
        minimumResultsForSearch: -1,
    });
    
    
</script>
@isset($expiry)
    <script nonce="{{ session('src-nonce') }}">
        var countDownDate = new Date(`<?php echo $expiry?>`).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            seconds < 10 ? '0' + seconds.toString() : seconds
            document.getElementById("countdown").innerHTML = "( " + seconds + " )";
            if (distance < 0) {
                clearInterval(x);
                let countdown = document.getElementById("countdown").style.display = 'none';
                resendButton = document.getElementById('resendButton')
                resendButton.classList.remove('btn-link')
                resendButton.classList.add('btn-primary')
                resendButton.disabled = false
                let resendLink = document.getElementById('resendLink').setAttribute('href', '/one-time-password/resend');
            }
        }, 1000);
    </script>
    <style>
        a {
            text-decoration: none
        }
        .otp-submit-btn {
            width: 100%;
        }
        .otp-resend-btn {
            width: 100%;
            display: block;
            text-align: center;
        }
        .btn-link {
            color: black;
            text-decoration: none;
        }
        .otp-back-btn {
            width: 100%;
            display: block;
            text-align: center
        }
    </style>
@endisset
</body>
</html>