<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'name', 'coefficient', 'type', 'description'
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function studentClasses()
    {
        return $this->belongsToMany(StudentClass::class);
    }
}
