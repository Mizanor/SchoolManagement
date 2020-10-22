<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StudentMarks extends Model
{
    public function student(){
    	return $this->belongsTo(User::class,'student_id','id');
    }
    public function student_class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function section(){
        return $this->belongsTo(StudentShift::class,'section_id','id');
    }
    public function year(){
    	return $this->belongsTo(Year::class,'year_id','id');
    }
     public function roll(){
    	return $this->belongsTo(AssignStudent::class,'student_id','student_id');
    }
     public function subject(){
    	return $this->belongsTo(AssignSubject::class,'Assign_subject_id','id');
    }
    
}
