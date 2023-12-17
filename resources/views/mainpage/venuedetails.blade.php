@include('mainpage.header')
<body data-rsssl="1" class="room-template-default single single-room hotelmaster-button-classic-style  header-style-2  hotelmaster-classic-style  hotelmaster-single-classic-style">
@include('mainpage.navbar')

<div id="gdlr-header-substitute"></div>
        <div class="gdlr-page-title-wrapper">
            <div class="gdlr-page-title-overlay"></div>
            <div class="gdlr-page-title-container container">
                <h3 class="gdlr-page-title">{{ $data->venue_name }}</h3>
            </div>
        </div>
        <!-- is search -->
        <div class="content-wrapper">
            <div class="gdlr-content">

                <div class="with-sidebar-wrapper">
                    <div class="with-sidebar-container container gdlr-class-no-sidebar">
                        <div class="with-sidebar-left twelve columns">
                            <div class="with-sidebar-content twelve columns">
                                <div class="gdlr-item gdlr-item-start-content ">
                                    <div id="room-3596"
                                        class="post-3596 room type-room status-publish has-post-thumbnail hentry room_category-room room_tag-luxury room_tag-room room_tag-standard">
                                        <form class="gdlr-reservation-bar" id="gdlr-reservation-bar"
                                            data-action="gdlr_hotel_booking" method="post"
                                            action="/eventbooking">
                                            @csrf
                                            <div class="gdlr-reservation-bar-title">Your Reservation</div>
                                            <div class="gdlr-reservation-bar-summary-form"
                                                id="gdlr-reservation-bar-summary-form"></div>
                                            <div class="gdlr-reservation-bar-room-form"
                                                id="gdlr-reservation-bar-room-form"></div>
                                            <div class="gdlr-reservation-bar-date-form"
                                                id="gdlr-reservation-bar-date-form">
                                                <div class="gdlr-reservation-field gdlr-resv-datepicker"><span
                                                        class="gdlr-reservation-field-title">Reservation Date</span>
                                                    <div class="gdlr-datepicker-wrapper">
                                                        <input type="text" id="reservedatepicker" class="gdlr-datepicker" name="reserved_date"/>
                                                    </div>
                                                </div>
                                                <div class="event_booking_form">
                                                <p>Time (required)</p>
                                                    <input type="time" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="time_start" name="time_start">
                                                        -
                                                    <input type="time" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="time_end" name="time_end">
                                                    <p>Client Name (required)</p>
                                                    <input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="client_name" name="client_name">
                                                    <p>Event Name (required)</p>
                                                    <input type="text" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="event_name" name="event_name">
                                                   
                                                    <p>Number of guests (required)</p>
                                                    <input type="number" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="number_of_guests" name="number_of_guests">
                                                </div>
                                                <input type="hidden" name="user_id" value="{{session('user_id')}}">
                                                <input type="hidden" name="venue_id" value="{{$data->venue_id}}">
                                                @if(session('logged') == true)
                                                    <a href="#" class="gdlr-reservation-bar-button gdlr-button with-border" id="reserve_venue">Reserve Now</a>
                                                @else
                                                  <a href="/customerlogin" class="gdlr-reservation-bar-button gdlr-button with-border">Login to reserve</a>  
                                                @endif
                                                <div class="clear"></div>
                                            </div>
                                            <div class="gdlr-reservation-bar-service-form"
                                                id="gdlr-reservation-bar-service-form"></div>
                                        </form>
                                        <div class="gdlr-room-main-content ">
                                            <div class="gdlr-room-thumbnail gdlr-single-room-thumbnail">
                                                <a href="{{ asset('mainpage/main photos') }}/{{ $data->main_photo }}"
                                                    data-rel="fancybox"><img
                                                        src="{{ asset('mainpage/main photos') }}/{{ $data->main_photo }}"
                                                        alt="" width="750" height="330" /></a>
                                            </div>
                                            <div class="gdlr-room-title-wrapper">
                                                <h3 class="gdlr-room-title">{{ $data->venue_name }}</h3>
                                                <div class="gdlr-room-price"><span class="gdlr-head">Start
                                                        From</span><span class="gdlr-tail">₱{{ $data->price }} /
                                                        Day</span></div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="gdlr-room-content">
                                                <h5>Details</h5>
                                                <p>{{ $data->description }}</p>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 40px;"></div>

                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: -20px;"></div>
                                                <div class="gdlr-shortcode-wrapper gdlr-row-shortcode">

                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 10px;"></div>
                                                <div class="gdlr-shortcode-wrapper">
                                                    <div class="clear"></div>
                                                    <div class="gdlr-item gdlr-divider-item">
                                                        <div class="gdlr-divider thick"></div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: -20px;"></div>
                                                <div class="gdlr-shortcode-wrapper gdlr-row-shortcode">


                                                    <div class="clear"></div>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 10px;"></div>

                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: -20px;"></div>

                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 10px;"></div>

                                                <p><strong>Photos</strong></p>
                                                <div class="gdlr-shortcode-wrapper">
                                                    @php
                                                        $otherPhotos = explode(',', $data->additional_photos);
                                                    @endphp
                                                    <div class="gdlr-gallery-item gdlr-item">
                                                        @for ($i = 0; $i < count($otherPhotos); $i++)
                                                            <div class="gallery-column three columns">
                                                                <div class="gallery-item">
                                                                    <a href="{{ asset('mainpage/additional photos') }}/{{ $otherPhotos[$i] }}"
                                                                        data-fancybox-group="gdlr-gal-1"
                                                                        data-rel="fancybox">
                                                                        <img src="{{ asset('mainpage/additional photos') }}/{{ $otherPhotos[$i] }}"
                                                                            alt="" width="400"
                                                                            height="300" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 10px;"></div>
                                                <div class="gdlr-shortcode-wrapper">
                                                    <div class="clear"></div>
                                                    <div class="gdlr-item gdlr-divider-item">
                                                        <div class="gdlr-divider thick"></div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: -10px;"></div>


                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: 40px;"></div>
                                                <div class="clear"></div>
                                                <div class="gdlr-space" style="margin-top: -20px;"></div>
                                                <p><strong>Location</strong></p>
                                                <p>Address: {{ $data->location }}<br />
                                                    Phone: {{ $data->contact_number }}<br />
                                                    Email: {{ $data->email_address }} <br/>
                                                    Contact Person: {{$data->first_name}} {{$data->last_name}}
                                                </p>

                                            </div>
                                        </div>
                                    </div><!-- #room -->

                                    <div class="clear"></div>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>

            </div><!-- gdlr-content -->
            <div class="clear"></div>
        </div><!-- content wrapper -->


@include('mainpage.footer')