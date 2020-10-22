<?php

namespace App\Http\Controllers\Backend\Check;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;

use App\Model\AssignSubject;
use App\Model\MarksGrade;

use App\User;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\ExamType;
use App\Model\Year;
use App\Model\StudentMarks;
use DB;
use PDF;

class CheckController extends Controller
{
    public function view(){
        $data['years']= Year::orderBy('id','asc')->get();
        $data['classes']= StudentClass::all();
        $data['shifts']= StudentShift::all();
        $data['exam_type'] = ExamType::all();
        $data['year_id'] = Year::orderBy('id','asc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
        $data['section_id'] = StudentShift::orderBy('id','asc')->first()->id;
        $data['allData'] = StudentMarks:: where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->where('section_id',$data['section_id'])->where('exam_type_id',$data['exam_type'])->get();
        
        
        return view('backend.account.employee.check',$data);
    }
  public function YearClassWise(Request $request){
        $data['years']= Year::orderBy('id','desc')->get();
        $data['classes']= StudentClass::all();
        $data['shifts']= StudentShift::all();
        $data['exam_type'] = ExamType::all();
       
      
        
        $data['allData'] = StudentMarks:: where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('section_id',$request->shift_id)->where('exam_type_id',$request->exam_id)->get();

      

       
        return view('backend.account.employee.check',$data);
    }

   public function result($student_id){

    // $marks = StudentMarks::where('student_id',$student_id)->get();

    // foreach ($marks as $mark) {
    //     $subject_id = AssignSubject::where('id',$mark->assign_subject_id )->get();
    //     dd($subject_id);

    // }

    

    // dd($marks);

   
    

        
        $data['result'] = StudentMarks::where('student_id',$student_id)->first();
        $pdf = PDF::loadView('backend.account.employee.check-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
