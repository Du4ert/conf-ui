<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }
    
    
    protected $fillable = [
        'file',
        'thesis_id',
    ];

}
