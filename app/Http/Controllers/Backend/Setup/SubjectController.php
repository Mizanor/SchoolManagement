<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Subject;
use App\Model\ExamSubjectType;
use DB;

class SubjectController extends Controller
{
    public function view(){

    	$data['allData'] = Subject::all();
    	return view('backend.setup.subject.view-subject',$data);
    }

    public function add(){
        $data['allData'] = ExamSubjectType::all();

    	return view('backend.setup.subject.add-subject',$data);
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:subjects,name',
            'code'=>'unique:subjects,code'
        ]);

    	$data = new Subject();
    	$data->name = $request->name;
        $data->code = $request->code;
        $data->type = $request->type;
        $data->save();
        
    	return redirect()->route('setups.subject.view')->with('success','Data Inserted Successfully');
    }

    public function edit($id){
        $editData = Subject::find($id);
        return view('backend.setup.subject.add-subject',compact('editData'));
    }

    public function update(Request $request, $id){
        $data =Subject::find($id);
        $this->validate($request,[
            'name'=>'required|unique:subjects,name,'.$data->id,
            
        ]);

        
        $data->name = $request->name;
        $data->code = $request->code;
        $data->type = $request->type;
        $data->save();
        
        return redirect()->route('setups.subject.view')->with('success','Data Updated Successfully');
    }

    public function delete(Request $request){
        $data = Subject::find($request->id);
        $data->delete();

        return redirect()->route('setups.subject.view')->with('success','Data deleted Successfully');
    }
}
