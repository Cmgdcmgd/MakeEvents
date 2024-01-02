@include('mainpage.header')
@include('mainpage.navbar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
			<div id="gdlr-header-substitute" ></div>
			<div class="gdlr-page-title-wrapper"  >
				<div class="gdlr-page-title-overlay"></div>
				<div class="gdlr-page-title-container container" >
					<h3 class="gdlr-page-title">Vendors</h3>
				</div>	
			</div>	
			<br>
			<div class="container" style="color:#ad977b;">
				<div class="gdlr-hotel-availability-wrapper" style="margin-bottom: 20px;">
					<form  id="filter_search" class="gdlr-hotel-availability gdlr-item" id="gdlr-hotel-availability" method="post" action="/filtervenues">
						@csrf
						<div class="gdlr-reservation-field gdlr-resv-datepicker"><span class="gdlr-reservation-field-title">Events Catered</span>
							<div class="gdlr-wrapper">
								<select class="required form-control" name="event_offered">
									<option value="">Please select..</option>
                            	@foreach($events as $option)
                            		<option value="{{$option->event_name}}">{{$option->event_name}}</option>
                           		@endforeach
                        		</select>
							</div>
						</div>
						
						<div class="gdlr-reservation-field gdlr-resv-datepicker"><span class="gdlr-reservation-field-title">Services Catered</span>
							<div class="gdlr-wrapper">
								<select class="required form-control" name="service_offered">
									<option value="">Please select..</option>
                            	@foreach($services as $option)
                            		<option value="{{$option->service_name}}">{{$option->service_name}}</option>
                           		@endforeach
                        		</select>
							</div>
						</div>

						<div class="gdlr-reservation-field gdlr-resv-datepicker"><span class="gdlr-reservation-field-title">Max Capacity</span>
							<div class="gdlr-wrapper range-wrap">
								<div class="range-value" id="rangeV"></div>
								<input type="range" min="1" max="{{$maxCapacity}}" id="maxcapacity" name="maxcapacity" value="1" class="form-control">
							</div>
						</div>
						<div class="gdlr-reservation-field gdlr-resv-datepicker"><span class="gdlr-reservation-field-title">Location</span>
							<div class="gdlr-wrapper">
								<select class="required form-control" name="location_offered">
									<option value="">Please select..</option>
                            	@foreach($locations as $option)
                            		<option value="{{$option}}">{{$option}}</option>
                           		@endforeach
                        		</select>
							</div>
						</div>
							<div class="gdlr-wrapper">
								<div class="gdlr-reservation-field gdlr-resv-datepicker"><span class="gdlr-reservation-field-title"></span>
								<button class="gdlr-button with-border" type="submit" style="margin-top:10px;" id="filter">Filter
									<i class="fa fa-long-arrow-right icon-long-arrow-right"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>

			<div class="gdlr-content">
				<div class="with-sidebar-wrapper">
					<section id="content-section-1" >
						<div class="section-container container">
							<div class="room-item-wrapper type-classic"  style="margin-bottom: 30px;" >
								<div class="room-item-holder ">
									<div class="clear"></div>
                                        <div class="clear"></div>
									<div class="row">
										@foreach ($data as $item)
										<div class="col-sm-4">
											<div class="gdlr-item gdlr-room-item gdlr-classic-room">
												<div class="gdlr-ux gdlr-classic-room-ux">
													<div class="gdlr-room-thumbnail">
														<a href="/venuedetails/{{$item->venue_id}}" >
															<img src="{{asset('mainpage/main photos')}}/{{$item->main_photo}}" alt="" width="700" height="400" />
														</a>
													</div>
													<h3 class="gdlr-room-title">
														<a href="/venuedetails/{{$item->venue_id}}" >{{$item->venue_name}}</a>
													</h3>
													<div class="gdlr-hotel-room-info">
														<div class="gdlr-room-price">
															<span class="gdlr-tail">{{$item->location}}</span>
														</div><div class="clear"></div>
													</div>
													<a class="gdlr-button with-border" href="/venuedetails/{{$item->venue_id}}">Check Details
														<i class="fa fa-long-arrow-right icon-long-arrow-right"></i>
													</a>
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</section>

		</div><!-- gdlr-content -->
			<div class="clear" ></div>
		</div><!-- content wrapper -->

@include('mainpage.footer')