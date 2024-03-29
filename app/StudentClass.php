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

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
