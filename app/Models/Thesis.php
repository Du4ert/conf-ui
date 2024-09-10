<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $sections = ['genomics', 'biotechnology', 'breeding', 'bioresource'];
    protected $reportForms = ['oral', 'poster', 'absentee'];
    protected $fileTypes = ['poster', 'expert'];

    public function file()
    {
        return $this->hasOne(File::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function coauthors()
    {
        return $this->hasMany(Coauthor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'thesis_title',
        'thesis_title_en',
        'text',
        'text_en',
        'section',
        'report_form',
        'submitted_status',
    ];

}
