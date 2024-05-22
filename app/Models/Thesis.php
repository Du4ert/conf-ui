<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    public function user()
{
    return $this->belongsTo(User::class);
}

    protected $fillable = [
        'title',
        'file_path',
        'user_id'
    ];
}
