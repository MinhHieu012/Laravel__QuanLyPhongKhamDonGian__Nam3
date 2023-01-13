<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class appointment_times extends Model
{
    use HasFactory;

    function appointment_schedules(): HasMany
    {
        return $this->hasMany(appointment_schedules::class);
    }

}
