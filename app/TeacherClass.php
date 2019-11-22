<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    //
    protected $table = 'teacher_classes';

    protected $fillable = [
        'class_id', 'teacher_id'
    ];
}
