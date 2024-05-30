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

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function theses()
    {
        return $this->hasMany(Thesis::class);
    }

    protected $fileTypes = [
        // 'thesis_ru',
        // 'thesis_en',
        // 'thesis2_ru',
        // 'thesis2_en',
        'poster',
        'payment',
    ];

    protected $thesisTypes = [
        'thesis_ru',
        'thesis_en',
        'thesis2_ru',
        'thesis2_en',
    ];


    public function fileByTypes ($files)
    {
        $fileByTypes = [];
        foreach ($this->fileTypes as $type) {
            $fileByTypes[$type] = $files->where('type', $type)->first();
        }

          return $fileByTypes;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'first_name',
        'last_name',
        'middle_name',
        'organization_title',
        'job_title',
        'rank_title',
        'phone',
        'pay_status',
        'accepted_status',
        // 'thesis_title_ru',
        // 'thesis_title_en',
        // 'section',
        // 'report_form'
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
