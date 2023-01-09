<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class rooms extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getRoomsStatusAttribute($value)
    {
        return $value == 0 ? 'Đang trống' : 'Đang khám';
    }
}
