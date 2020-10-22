<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\StudentAttendence;
use App\Model\StudentGroup;
use App\Model\StudentClass;

use App\Model\StudentShift;

use App\Model\Year;
use App\Model\AssignStudent;
use DB;
use PDF;

class StudentAttendController extends Controller
{
    public function view(){
    	 $data['years']= Year::orderBy('id','asc')->get();
        $data['classes']= StudentClass::all();
        $data['shifts']= StudentShift::all();
        $data['groups']= StudentGroup::all();
        
        $data['year_id'] = Year::orderBy('id','asc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
        $data['shift_id'] = StudentShift::orderBy('id','asc')->first()->id;
        $data['allData'] = AssignStudent:: where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->where('shift_id',$data['shift_id'])->where('group_id',$data['groups'])->get();

         return view('backend.student.attend.attendance-view',$data);


    
    }

     public function YearClassWise(Request $request){
        $data['years']= Year::orderBy('id','desc')->get();
        $data['classes']= StudentClass::all();
        $data['shifts']= StudentShift::all();
         $data['groups']= StudentGroup::all();
       
      
        
        $data['allData'] = AssignStudent:: where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('shift_id',$request->shift_id)->where('group_id',$request->group_id)->get();

      

       
        return view('backend.student.attend.attendance-view',$data);
    }
}
