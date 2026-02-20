<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'studyprogram_id',
        'title',
        'description',
        'date',
        'documentation',
    ];

    public function studyprogram()
    {
        return $this->belongsTo(Studyprogram::class);
    }
}
