<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinterface extends Model
{
    protected $table = 'userinterfaces';
    protected $fillable = [
        'studyprogram_id',
        'image_background',
        'image_logo',
    ];

    public function studyprogram()
    {
        return $this->belongsTo(Studyprogram::class);
    }
}
