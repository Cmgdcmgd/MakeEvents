@include('mainpage.header')
@include('mainpage.navbar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div id="gdlr-header-substitute" ></div>
			<div class="gdlr-page-title-wrapper"  >
				<div class="gdlr-page-title-overlay"></div>
				<div class="gdlr-page-title-container container" >
					<h1 class="gdlr-page-title">All Coordinators</h1>
				</div>	
			</div>	

			<div class="gdlr-content">
				<div class="with-sidebar-wrapper">
					<section id="content-section-1" >
						<div class="section-container container">
							<div class="room-item-wrapper type-classic"  style="margin-bottom: 30px;" >
								<div class="room-item-holder ">
									<div class="clear"></div>
									<div class="row">
                                    @foreach ($data as $coordinator)
                                    <div class="col-sm-4">
										<div class="gdlr-item gdlr-room-item gdlr-classic-room">
											<div class="gdlr-ux gdlr-classic-room-ux">
												<div class="gdlr-room-thumbnail">
													<a href="/coordinatordetails/{{$coordinator->coordinator_id}}" >
														<img src="{{asset('mainpage/coordinators/main photos')}}/{{$coordinator->main_photo}}" alt="" width="700" height="400" />
													</a>
												</div>
												<h3 class="gdlr-room-title">
													<a href="/coordinatordetails/{{$coordinator->coordinator_id}}" >{{$coordinator->first_name}} {{$coordinator->last_name}}</a>
												</h3>
												<div class="gdlr-hotel-room-info">
													<div class="gdlr-room-price">
														
													</div><div class="clear"></div>
												</div>
												<a class="gdlr-button with-border" href="/coordinatordetails/{{$coordinator->coordinator_id}}">Check Details
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