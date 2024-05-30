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
        // 'poster',
        'agreement',
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

    public function thesisByTypes ($theses)
    {
        $thesisByTypes = [];
        foreach ($this->thesisTypes as $type) {
            $thesisByTypes[$type] = $theses->where('type', $type)->first();
        }

          return $thesisByTypes;
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
        'first_name_en',
        'last_name',
        'last_name_en',
        'middle_name',
        'middle_name_en',
        'organization_title',
        'organization_title_en',
        'job_title',
        'job_title_en',
        'rank_title',
        'rank_title_en',
        'phone',
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
