<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class appointment_schedules extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    function accounts() {
        $this->belongsTo(accounts::class, 'accounts_id');
    }

    function health_consultation_status() {
        $this->belongsTo(health_consultation_status::class, 'health_consultation_status_id');
    }

    function payment_status() {
        $this->belongsTo(payment_status::class, 'payment_status_id');
    }
}
