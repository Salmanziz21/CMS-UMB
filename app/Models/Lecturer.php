<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = 'lecturers';
    protected $fillable = [
        'studyprogram_id',
        'name',
        'major',
        'photo',
    ];

    public function studyprogram()
    {
        return $this->belongsTo(Studyprogram::class);
    }
}
