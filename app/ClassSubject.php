<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    //
    protected $table = 'student_class_subject';
    protected $fillable = [
        'student_class_id', 'subject_id'
    ];
}
