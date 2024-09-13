<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coauthor extends Model
{
    use HasFactory;

    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }

    public function fullName()
    {
        $fullName = $this->last_name;

        if ($this->first_name !== '-') {
            $fullName .= ' ' . mb_substr($this->first_name, 0, 1) . '.';
        }

        if ($this->middle_name  && $this->middle_name !== '-') {
            $fullName .= ' ' . mb_substr($this->middle_name, 0, 1) . '.';
        }


        return $fullName;
    }

    public function fullNameEn()
    {
        $fullName = $this->last_name_en;

        if ($this->first_name_en !== '-') {
            $fullName .= ' ' . mb_substr($this->first_name_en, 0, 1) . '.';
        }

        if ($this->middle_name_en  && $this->middle_name_en !== '-') {
            $fullName .= ' ' . mb_substr($this->middle_name_en, 0, 1) . '.';
        }

        return $fullName;
    }

    protected $fillable = [
        'thesis_id',
        'first_name',
        'first_name_en',
        'last_name',
        'last_name_en',
        'middle_name',
        'middle_name_en',
        'organization_title',
        'organization_title_en',
    ];
}
