<?php
namespace App\Services\OTP\Types;

use App\Interfaces\OTPInterface;
use Seshac\Otp\Otp;
use App\Mail\OTPMailer;
use Mail;
use Carbon\Carbon;

class EmailOTP implements OTPInterface
{
    private string $receiver;
    private int $token;
    private bool $noError;
    private string $errorMessage;

    public function __construct(string $receiver, int $token = 11111) {
        $this->receiver = $receiver;
        $this->token = $token;
    }

    public function generate() : self {
        $response = Otp::generate($this->receiver);
        if ($response->status) {
            $this->token = $response->token;
        }
        $this->noError = $response->status;
        return $this;
    }

    public function getToken() : int {
        return $this->token;
    }

    public function getStatus() : bool {
        return $this->noError;
    }

    public function getMessage() : string {
        return $this->errorMessage;
    }

    public function send() : self {
        Mail::to($this->receiver)->send(new OTPMailer($this->token, $this->receiver));
        $this->noError = true;
        return $this;
    }

    public function getExpiry() : string {
        $expiry = Otp::expiredAt($this->receiver);
        return $expiry = ($expiry->expired_at)->format('M d, Y H:i:s');
    }

    public function isExpired() : bool {
        $isExpired = Carbon::now() > Carbon::parse($this->getExpiry());
        if ($isExpired) {
            $this->errorMessage = 'OTP was expired!';
        }
        return $isExpired;
    }

    public function isLimitReached() : bool {
        return $this->errorMessage === 'You reached the 3 attempts count so we sent you a new OTP code';
    }

    public function verify(int $code) : self {
        $response = Otp::validate($this->receiver, $code);
        $this->noError = $response->status;
        $this->errorMessage = $response->message === 'Reached the maximum allowed attempts' ? 'You reached the 3 attempts count so we sent you a new OTP code' : $response->message;
        return $this;
    }

}