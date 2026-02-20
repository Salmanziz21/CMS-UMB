<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    protected $table = 'socialmedias';

    protected $fillable = [
        'studyprogram_id',
        'name_app',
        'name',
        'url',
    ];

    public function studyprogram()
    {
        return $this->belongsTo(Studyprogram::class);
    }
}
