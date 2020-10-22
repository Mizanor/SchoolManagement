<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Subject;
use App\Model\AssignSubject;
use DB;
use Auth;

class AssignSubjectController extends Controller
{
     public function view(){


    	$data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
    	return view('backend.setup.assign_subject.view-assign-subject',$data);
    }

    public function add(){
    	$data['subjects'] = Subject::all();
    	$data['classes'] = StudentClass::all();
    	return view('backend.setup.assign_subject.add-assign-subject',$data);
    }
    public function store(Request $request){
        
    	$subjectCount = count($request->subject_id);
    	if($subjectCount !=NULL){
    		for($i=0; $i<$subjectCount ; $i++){
             //$getsubject = Subject::where('id',$request->subject_id[$i])->first();
             //dd()

    			$assign_sub = new AssignSubject();
    			$assign_sub->class_id = $request->class_id;
    			$assign_sub->subject_id = $request->subject_id[$i];
    			$assign_sub->full_mark = $request->full_mark[$i];
    			$assign_sub->pass_mark = $request->pass_mark[$i];
    			$assign_sub->subjective_mark = $request->subjective_mark[$i];
    			$assign_sub->save();

    		}
    	}
    
    	return redirect()->route('setups.assign.subject.view')->with('success','Data Inserted Successfully');
    }

    public function edit($class_id){
        $data['editData'] = AssignSubject::where('class_id',$class_id)->get();
        //dd($data['editData']->toArray());
        $data['subjects'] = Subject::all();
    	$data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit-assign-subject',$data);
    }

    public function update(Request $request, $class_id){
    	if($request->subject_id==NULL){
    		return redirect()->back()->with('error','Please Select an item and Try Again');
    	}else{
    		AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('class_id',$request->class_id)-> delete();
    		foreach ($request->subject_id as $key => $value) {
                $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('class_id',$request->class_id)->first();
                if ($assign_subject_exist){
                    $assignSubjects = $assign_subject_exist;
                }else{
                    $assignSubjects = new AssignSubject();
                }
                $assignSubjects->class_id = $request->class_id;
                $assignSubjects->subject_id = $request->subject_id[$key];
                $assignSubjects->full_mark = $request->full_mark[$key];
                $assignSubjects->pass_mark = $request->pass_mark[$key];
                $assignSubjects->subjective_mark = $request->subjective_mark[$key];
                //12 munite tuto 31
                $assignSubjects->save();
            }

    		}

    		
    	
    	
        
        return redirect()->route('setups.assign.subject.view')->with('success','Data Updated Successfully');
    }
    public function details($class_id){
    	$data['editData'] = AssignSubject::where('class_id',$class_id)->get();
        //dd($data['editData']->toArray());
       
        return view('backend.setup.assign_subject.details-assign-subject',$data);

    }
}
