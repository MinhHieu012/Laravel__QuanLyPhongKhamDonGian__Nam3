<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class payment_status extends Authenticatable
{
    use HasFactory;

    function appointment_schedules(): HasMany
    {
        return $this->hasMany(appointment_schedules::class);
    }
}
