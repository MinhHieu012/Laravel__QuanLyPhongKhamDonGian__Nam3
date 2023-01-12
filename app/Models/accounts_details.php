<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class accounts_details extends Model
{
    use HasFactory;

    public function accounts(): BelongsTo
    {
        return $this->belongsTo(accounts::class, 'accounts_id');
    }

    protected $fillable = [
        'accounts_id',
        'phones',
        'date_of_births',
        'genders',
        'address',
        'doctor_specialty',
    ];
}
