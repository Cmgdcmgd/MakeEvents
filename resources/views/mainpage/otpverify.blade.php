@include('mainpage.header')
@include('mainpage.navbar')

<div class="with-sidebar-wrapper">
    <div class="with-sidebar-container container">
        <div class="with-sidebar-left eight columns">
            <div class="with-sidebar-content twelve columns">
                <section id="content-section-2" >
                    <div class="section-container container">
                        <div class="gdlr-item gdlr-content-item"  style="margin-bottom: 60px;" >
                            <form class="sign-in-form" method="POST" action="/userverify" style="width: 500px;">
                                @csrf
                                <div class="card">
                                    <div class="card-body mb-0">
                                        <h5 class="sign-in-heading text-center m-b-20">
                                            To verify your identity, we've sent a one-time password (OTP) to your registered email address <b>{{$email}}</b>.
                                        </h5>
                                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                            <input type="text" 
                                                    id="code" 
                                                    name="code" 
                                                    class="form-control @error('code') is-invalid @enderror" 
                                                    data-rule-required="true" 
                                                    aria-required="true"
                                                    style="text-align:center;"
                                                    maxlength="6"
                                                    required
                                                    >
                                        </div>
                                        @if ($errors->has('code'))
                                            <div class="help-block text-danger text-center">
                                                <strong>{{$errors->first('code')}}</strong>
                                            </div>
                                        @endif
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <div class="clear"></div>
                                        <div class="clear"></div>
                                        <button class="wpcf7-form-control wpcf7-submit has-spinner" type="submit">Submit</button>
                                        <a href="#" id="resendLink">
                                            <button id="resendButton" class="btn btn-link btn-rounded btn-floating btn-block mb-1 otp-resend-btn" disabled type="button">Resend <span id="countdown"></span></button>
                                        </a>
                                        <a href="/one-time-password/cancel">
                                            <button class="btn btn-default btn-rounded btn-floating btn-block otp-back-btn" type="button" >Back</button>
                                        </a>
                                    </div>

                                </div>
                            </form>
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