<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
    	'first_name', 'middle_name', 'last_name',
    	'class_id', 'date_of_birth', 'sex', 'palce_of_birth',
    	'student_phone', 'student_email', 'student_address',
    	'parent_address', 'school_last_attended', 'student_image',
    	'parent_phone', 'full_name'
    ];

    public function studentClass()
    {
    	return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
