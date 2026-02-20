<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graduateprofile extends Model
{
    protected $table = 'graduateprofiles';
    protected $fillable = [
        'studyprogram_id',
        'title',
        'description',
    ];

    public function studyprogram()
    {
        return $this->belongsTo(Studyprogram::class);
    }
}
