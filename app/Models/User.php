<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

        public function thesis()
    {
        return $this->hasOne(Thesis::class);
    }

    public function files()
    {
        return $this->hasMany(Files::class);
    }

    public function fileByTypes ($files)
    {
        $fileByTypes = [
            'thesis_ru' => $files->where('type', 'thesis_ru')->first(),
            'thesis_en' => $files->where('type', 'thesis_en')->first(),
            'poster' => $files->where('type', 'poster')->first(),
          ];

          return $fileByTypes;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'first_name',
        'last_name',
        'middle_name',
        'organization_title',
        'job_title',
        'rank_title',
        'pay_status',
        'accepted_status',
    ];

    // Fields with default values
    protected $attributes = [
        'pay_status' => false,
        'accepted_status' => false,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
