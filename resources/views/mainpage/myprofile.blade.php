@include('mainpage.header')
@include('mainpage.navbar')

<div id="gdlr-header-substitute" ></div>
			<div class="gdlr-page-title-wrapper"  >
				<div class="gdlr-page-title-overlay"></div>
				<div class="gdlr-page-title-container container" >
					<h1 class="gdlr-page-title">My Profile</h1>
				</div>	
			</div>

            <div class="content-wrapper">
                <div class="gdlr-content">
    
                    <!-- Above Sidebar Section-->
    
                    <!-- Sidebar With Content Section-->
                    <div class="main-content-container container gdlr-item-start-content">
                        <div class="gdlr-item gdlr-main-content">
                            <h2 class="gdlr-heading-shortcode " style="font-size: 30px;font-weight: bold;">My Info</h2>
                            <div class="clear"></div>
                            <div class="gdlr-space" style="margin-top: 35px;"></div>
                            <div class="clear"></div>
                            <div class="gdlr-space" style="margin-top: 30px;"></div>
                            <div class="clear"></div>
                            <div class="gdlr-space" style="margin-top: 35px;"></div>
                            <div class="gdlr-shortcode-wrapper">
                                <div class="gdlr-personnel-item-wrapper">
                                    <div class="clear"></div>
                                    <div class="six columns">
                                        <div class="gdlr-item gdlr-personnel-item plain-style">
                                            <div class="gdlr-ux gdlr-personnel-ux">
                                                <div class="personnel-item">
                                                    <div class="personnel-author-image gdlr-skin-border"><img src="{{asset('mainpage/upload/profile.png')}}" alt=""></div>
                                                    <div class="personnel-info">
                                                        <div class="personnel-author gdlr-skin-title">{{$user->first_name}} {{$user->last_name}}</div>
                                                    </div>
                                                    <div class="personnel-content gdlr-skin-content">
                                                        <p>
                                                            Phone: {{ $user->contact_number }}<br />
                                                            Email: {{ $user->email }}<br />
                                                        </p>

                                                        <a class="gdlr-button with-border" type="submit" href="/editprofile" id="filter">Edit Profile
                                                            <i class="fa fa-long-arrow-right icon-long-arrow-right"></i>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clear"></div>
                                </div>
                            </div>
                            
                            <div class="clear"></div>
                            
                        </div>
                    </div>
    
                    <!-- Below Sidebar Section-->
    
                </div>
                <!-- gdlr-content -->
                <div class="clear"></div>
            </div>

@include('mainpage.footer')