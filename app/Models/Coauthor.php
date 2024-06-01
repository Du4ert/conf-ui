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
