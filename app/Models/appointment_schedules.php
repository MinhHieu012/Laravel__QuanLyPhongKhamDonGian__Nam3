<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class appointment_schedules extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    function accounts() {
        return $this->belongsTo(accounts::class, 'accounts_id');
    }

    function appointment_status() {
        return $this->belongsTo(appointment_status::class, 'appointment_status_id');
    }

    function appointment_times() {
        return $this->belongsTo(appointment_times::class, 'appointment_times_id');
    }

    function health_checkup_packages() {
        return $this->belongsTo(health_checkup_packages::class, 'health_checkup_packages_id');
    }

    function payment_status() {
        return $this->belongsTo(payment_status::class, 'payment_status_id');
    }

    function rooms() {
        return $this->belongsTo(rooms::class, 'rooms_id');
    }
}
