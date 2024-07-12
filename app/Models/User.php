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
    
    public function hasAcceptedThesis()
    {
        return $this->theses()->where('accepted_status', true)->exists();
    }

    protected $fileTypes = [
        'agreement',
        'payment',
    ];


    protected $adminSearchModifiers = [
        'has_thesis',
        'has_poster',
        'pay_status',
        'has_agreement',
        'accepted_status',
        'vavilov_article',
        'school_participation',
        'young_scientist',
    ];



    public function regalia() {
        $regalia = '';
        $regalia .= $this->rank_title;
        $regalia .= $regalia ? ', ' . $this->job_title : $this->job_title;

        return $regalia;
    }

    public function regaliaEn() {
        $regalia = '';
        $regalia .= $this->rank_title_en;
        $regalia .= $regalia ? ', ' . $this->job_title_en : $this->job_title_en;

        return $regalia;
    }
    

    public function fullNameExtend() {
        $fullName = $this->last_name;
        $fullName .= ' ' . $this->first_name;
        
        if ($this->middle_name) {
            $fullName .= ' ' . $this->middle_name;
        }
        
        return $fullName;
    }

    public function fullNameExtendEn() {
        $fullName = $this->last_name_en;
        $fullName .= ' ' . $this->first_name_en;
        
        if ($this->middle_name_en) {
            $fullName .= ' ' . $this->middle_name_en;
        }
        
        return $fullName;
    }

    public function fullName() {
        $fullName = $this->last_name . ' ';
        $fullName .= mb_substr($this->first_name, 0, 1) . '.';
        
        if ($this->middle_name) {
            $fullName .= ' ' . mb_substr($this->middle_name, 0, 1) . '.';
        }
        
        return $fullName;
    }

    public function fullNameEn() {
        $fullName = $this->last_name_en . ' ';
        $fullName .= mb_substr($this->first_name_en, 0, 1) . '.';
        
        if ($this->middle_name_en) {
            $fullName .= ' ' . mb_substr($this->middle_name_en, 0, 1) . '.';
        }
        
        return $fullName;
    }


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
        'vavilov_article',
        'school_participation',
        'young_scientist',
    ];

    // Fields with default values
    protected $attributes = [
        'pay_status' => false,
        'accepted_status' => false,
        'vavilov_article' => false,
        'school_participation' => false,
        'young_scientist' => false,
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
