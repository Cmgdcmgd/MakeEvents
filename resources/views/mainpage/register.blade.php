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
                                <h5 class="gdlr-heading-shortcode "  style="font-weight: bold;" >Register </h5>
                                <div class="clear"></div>
                                <div class="gdlr-space" style="margin-top: 25px;"></div>

                                <div class="wpcf7 no-js" id="wpcf7-f4-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response">
                                        <p role="status" aria-live="polite" aria-atomic="true"></p> 
                                        <ul></ul>
                                    </div>
                                    <form action="/addcustomer" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                                        @csrf
                                        <p>First Name (required)</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="text" name="first_name" />
                                            </span>
                                        </p>
                                        <p>Last Name (required)</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="text" name="last_name" />
                                            </span>
                                        </p>
                                        <p>Email Address (required)</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="email" name="email_address" />
                                            </span>
                                        </p>
                                        <p>Contact Number (required)</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="text" name="contact_number" />
                                            </span>
                                        </p>
                                        <p>Password (required)</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="password" name="password" />
                                            </span>
                                        </p>
                                        <p>Confirm Password (required)</p>
                                        <p>
                                            <span class="wpcf7-form-control-wrap" data-name="your-name">
                                                <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" type="password" name="password_confirmation" />
                                            </span>
                                        </p>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <p>
                                            <input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Submit" />
                                        </p>
                                        <div class="wpcf7-response-output" aria-hidden="true"></div>
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