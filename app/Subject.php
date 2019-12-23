<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function exams()
    {
        return $this->hasMany('App\Exam', 'subject_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'student_subject', 'subject_id', 'user_id')->withTimestamps();
    }
}
