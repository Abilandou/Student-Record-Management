<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    //
    protected $fillable = [
        'teacher_id', 'subject_id'
    ];
}
