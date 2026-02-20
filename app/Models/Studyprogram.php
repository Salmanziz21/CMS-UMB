<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studyprogram extends Model
{
    protected $table = 'studyprograms';

    protected $fillable = [
        'name',
        'accreditation',
        'description',
        'vision',
        'mission',
        'profilestudy',
        'history',
    ];

    public function quantities()
    {
        return $this->hasMany(Quantity::class);
    }

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function graduateprofiles()
    {
        return $this->hasMany(Graduateprofile::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function userinterfaces()
    {
        return $this->hasMany(Userinterface::class);
    }

    public function socialmedias()
    {
        return $this->hasMany(Socialmedia::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }
}
