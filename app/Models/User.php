<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Peserta;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Support\Facades\Notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'jenis_kelamin',
        'profesi',
        'no_hp',
        'province_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function workshop()
    {
        return $this->belongsToMany(Workshop::class, 'peserta', 'status');
    }
    public function peserta()
    {
        return $this->hasMany(Peserta::class);
    }

    // public function sendPasswordResetNotification($token)
    // {
    //     $url = 'http://localhost:8000/reset-password/' . $token;

    //     $this->notify(new ResetPasswordNotification($url));
    // }
}
