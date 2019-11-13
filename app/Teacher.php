<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'full_name', 'email', 'phone', 'address', 'country'
    ];

    public function subjects()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function classes()
    {
        return $this->belongsToMany(StudentClass::class);
    }
}
