<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class health_consultation_status extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    function health_consultation_status(): HasMany
    {
        return $this->hasMany(appointment_schedules:: class);
    }

}
