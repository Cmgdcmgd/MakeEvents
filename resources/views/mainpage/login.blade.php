@include('mainpage.header')
@include('mainpage.navbar')

<div class="with-sidebar-wrapper">
    <div class="with-sidebar-container container">
        <div class="with-sidebar-left eight columns">
            <div class="with-sidebar-content twelve columns">
                <section id="content-section-2" >
                    <div class="section-container container">
                        <div class="gdlr-item gdlr-content-item"  style="margin-bottom: 60px;" >
                            <p>
                                <div class="clear"></div>
                                <div class="gdlr-space" style="margin-top: -22px;"></div>
                                <h5 class="gdlr-heading-shortcode "  style="font-weight: bold;" >Login </h5>
                                <div class="clear"></div>
                                <div class="gdlr-space" style="margin-top: 25px;"></div>

                                <div class="wpcf7 no-js" id="wpcf7-f4-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response">
                                        <p role="status" aria-live="polite" aria-atomic="true"></p> 
                                        <ul></ul>
                                    </div>
                                    <form action="/logincustomer" method="POST">
                                        @csrf
                                        
                                        <p>Email Address </p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="text" name="email" />
                                            </span>
                                        </p>
                                        <p>Password</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="password" name="password" />
                                            </span>
                                        </p>
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                        <p>
                                            <input class="wpcf7-form-control wpcf7-submit" type="submit" value="Submit"><div style="float: right"></div><a href="/register" class="wpcf7-form-control wpcf7-submit" value="Register">Don't have an account yet? Register here</a>
                                        </p>
                                        <p>
                                            <a href="/administrator" class="wpcf7-form-control wpcf7-submit" value="Register">Vendor and Event Coordinator Login</a>
                                        </p>
                                    </form>
                                </div>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </section>							
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>				
</div>	

@include('mainpage.footer')