<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    //

    protected $table = 'student_class_teacher';

    protected $fillable = [
        'class_id', 'teacher_id'
    ];
}
