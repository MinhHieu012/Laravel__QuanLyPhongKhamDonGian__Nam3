<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class rooms extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    function appointment_schedules(): HasMany
    {
        return $this->hasMany(appointment_schedules::class);
    }

    public function getRoomsStatusAttribute($value)
    {
        return $value == 0 ? 'Đang trống' : 'Đang khám';
    }
}
