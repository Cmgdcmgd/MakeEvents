<?php
namespace App\Interfaces;
use App\Models\User;

interface OTPInterface
{
    public function generate() : self;
    public function getToken() : int;
    public function getStatus() : bool;
    public function getMessage() : string;
    public function send() : self;
    public function verify(int $code) : self;
    public function isExpired() : bool;
    public function isLimitReached() : bool;
    public function getExpiry() : string;
}