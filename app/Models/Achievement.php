<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';
    protected $fillable = [
        'studyprogram_id',
        'title',
        'description',
        'image',
        'date',
        'category',
    ];

    public function studyprogram()
    {
        return $this->belongsTo(Studyprogram::class);
    }
}
