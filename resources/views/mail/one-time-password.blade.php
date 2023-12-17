<!DOCTYPE html>
<html>
    <head>
        <style>
            .content {
                height: 100vh;
                width: 100%;
                font-family: "Poppins", sans-serif;
            }
            .content-center {
                display: flex;
                vertical-align: middle;
                align-items: center;
                justify-content: center;
                height: 100%;
            }
            .content-header img {
                width: 100%;
            }
            .content-header {
                text-align: center;
            }
            .content-body {
                text-align: center;
            }
            .text {
                font-size: 13px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="content-center">
                <div>
                    <div class="content-header">
                        <h3>
                            One-Time Password (OTP)
                        </h3>
                    </div>
                    <hr>
                    <div class="content-body">
                        <h4>Hello, {{$email}}!</h4>
                        <p class="text">Enter the following OTP to finish logging in</p>
                        <h3 class="otp">{{str_pad($token, 5, '0', STR_PAD_LEFT)}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>