<?php
namespace App\Services\OTP;
use App\Interfaces\OTPInterface;
use App\Models\User;
use Auth;

class OTPService
{
    private OTPInterface $otpMethod;

    public function __construct(OTPInterface $otpMethod) {
        $this->otpMethod = $otpMethod;
    }

    public function send() : bool {
        $status = $this->otpMethod->generate()->send()->getStatus();
        $this->verifiedUser($status);
        return $status;
    }

    public function getExpiry() : string {
        return $this->otpMethod->getExpiry();
    }

    public function isExpired() : bool {
        return $this->otpMethod->isExpired();
    }

    public function getMessage() : string {
        return $this->otpMethod->getMessage();
    }

    public function verify(int $code) : bool {
        $status = $this->otpMethod->verify($code)->getStatus();
        if ((!$status && $this->otpMethod->isExpired()) || (!$status && $this->otpMethod->isLimitReached())) {
            $this->otpMethod->generate()->send()->getStatus();
        }
        $this->verifiedUser($status);
        return $status;
    }

    public function verifiedUser(bool $status) {
        $user = User::where('email', Auth::user()->email)->first();
        $user->otp_verified = $status;
        $user->save();
    }
}