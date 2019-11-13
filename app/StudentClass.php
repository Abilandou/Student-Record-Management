<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    //
    protected $fillable = [
        'name', 'description',
    ];

    public function students()
    {
    	return $this->hasMany(Student::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
