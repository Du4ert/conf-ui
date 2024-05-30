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
        // 'participate',
        'first_name',
        'last_name',
        'middle_name',
        'organization_title',
        'job_title',
        'rank_title',
    ];
}
