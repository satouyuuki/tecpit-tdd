<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function canReserve(int $remainingCount, int $reservationCount): bool {
        if($remainingCount === 0) {
            return false;
        }
        if($this->plan === 'gold') {
            return true;
        }
        return $reservationCount < 5;
    }
}
