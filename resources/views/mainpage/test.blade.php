@include('mainpage.header')
@include('mainpage.navbar')

        <div id="gdlr-header-substitute"></div>
        <div class="gdlr-page-title-wrapper">
            <div class="gdlr-page-title-overlay"></div>
            <div class="gdlr-page-title-container container">
                <h1 class="gdlr-page-title">Booking</h1>
            </div>
        </div>
        <!-- is search -->
        <div class="content-wrapper">
            <div class="gdlr-content">

                <div class="with-sidebar-wrapper">
                    <div class="with-sidebar-container container gdlr-class-no-sidebar">
                        <div class="with-sidebar-left twelve columns">
                            <div class="with-sidebar-content twelve columns">
                                <div class="gdlr-item gdlr-item-start-content" id="gdlr-single-booking-content"
                                    data-ajax="https://demo.goodlayers.com/hotelmaster/wp-admin/admin-ajax.php">

                                    <form class="gdlr-reservation-bar" id="gdlr-reservation-bar"
                                        data-action="gdlr_hotel_booking">
                                        <div class="gdlr-reservation-bar-title">Your Reservation</div>
                                        <div class="gdlr-reservation-bar-summary-form"
                                            id="gdlr-reservation-bar-summary-form"></div>
                                        <div class="gdlr-reservation-bar-date-form"
                                            id="gdlr-reservation-bar-date-form">
                                            <div class="gdlr-reservation-field gdlr-resv-datepicker"><span
                                                    class="gdlr-reservation-field-title">Reservation Date</span>
                                                <div class="gdlr-datepicker-wrapper"><input type="text"
                                                        id="gdlr-check-in" class="gdlr-datepicker"
                                                        data-current-date="2023-09-09" autocomplete="off"
                                                        data-dfm="d M yy" data-block="[]" value="2023-09-09" /><input
                                                        type="hidden" class="gdlr-datepicker-alt"
                                                        name="gdlr-check-in" autocomplete="off" value="2023-09-09" />
                                                </div>
                                            </div>
                                            <div class="gdlr-reservation-field gdlr-resv-combobox gdlr-resv-night">
                                                <span class="gdlr-reservation-field-title">Days</span>
                                                <div class="gdlr-combobox-wrapper"><select name="gdlr-night"
                                                        id="gdlr-night">
                                                        <option value="1" selected>1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select></div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="gdlr-reservation-bar-service-form"
                                            id="gdlr-reservation-bar-service-form"></div><input type="hidden"
                                            name="single-room" value="3595" />
                                    </form>
                                    <div class="gdlr-booking-content">
                                        <div class="gdlr-booking-process-bar" id="gdlr-booking-process-bar"
                                            data-state="2">
                                            <div data-process="1" class="gdlr-booking-process ">1. Choose Date</div>
                                            <div data-process="2" class="gdlr-booking-process gdlr-active">2. Confirm
                                                Venue</div>
                                        </div>
                                        <div class="gdlr-booking-content-wrapper">
                                            <div class="gdlr-booking-content-inner" id="gdlr-booking-content-inner">
                                                <div class="gdlr-booking-room-wrapper">
                                                    <div class="gdlr-item gdlr-room-item gdlr-medium-room ">
                                                        <div class="gdlr-ux gdlr-medium-room-ux">
                                                            <div class="gdlr-room-thumbnail"><a
                                                                    href="https://demo.goodlayers.com/hotelmaster/room/superior-room-two-double-beds/"><img
                                                                        src="https://demo.goodlayers.com/hotelmaster/wp-content/uploads/2015/03/photodune-3973259-hotel-room-m-400x300.jpg"
                                                                        alt="" width="400"
                                                                        height="300" /></a></div>
                                                            <div class="gdlr-room-content-wrapper">
                                                                <h3 class="gdlr-room-title"><a
                                                                        href="https://demo.goodlayers.com/hotelmaster/room/superior-room-two-double-beds/">Superior
                                                                        Room &#8211; Two Double Beds</a></h3>
                                                                
																<br/>
                                                                <div class="gdlr-room-content">Room Details Donec sed
                                                                    odio dui. Donec sed odio dui. Aenean eu leo quam.
                                                                    Pellentesque ornare sem lacinia quam venenatis
                                                                    vestibulum. Curabitur blandit tempus porttitor.
                                                                    Integer posuere erat a ante venenatis dapibus
                                                                    posuere velit...</div><a
                                                                    class="gdlr-room-selection gdlr-button with-border" onclick="try()"
                                                                    href="#" data-roomid="3595">Book this now!</a>
                                                                <div class="gdlr-room-price"><span
                                                                        class="gdlr-head">Start From</span><span
                                                                        class="gdlr-tail">$68.00 / Day</span>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
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

<script type="text/JavaScript">
function try(){
	alert("hello");
}

</script>