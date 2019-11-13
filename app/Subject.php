<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'name', 'coefficient', 'type', 'description'
    ];

    public function teacher()
    {
        return $this->belongsToMany(Subject::class);
    }
}
