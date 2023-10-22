@include('mainpage.header')
@include('mainpage.navbar')
		
			<div id="gdlr-header-substitute" ></div>
			<div class="gdlr-page-title-wrapper"  >
				<div class="gdlr-page-title-overlay"></div>
				<div class="gdlr-page-title-container container" >
					<h3 class="gdlr-page-title">All Venues</h3>
				</div>	
			</div>	

			<div class="gdlr-content">
				<div class="with-sidebar-wrapper">
					<section id="content-section-1" >
						<div class="section-container container">
							<div class="room-item-wrapper type-classic"  style="margin-bottom: 30px;" >
								<div class="room-item-holder ">
									<div class="clear"></div>
                                    @foreach ($data as $item)
                                    <div class="four columns">
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
														<span class="gdlr-tail">₱{{$item->price}}</span>
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
					</section>

		</div><!-- gdlr-content -->
			<div class="clear" ></div>
		</div><!-- content wrapper -->

@include('mainpage.footer')