<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use DB;

class StudentClassController extends Controller
{
    public function view(){

    	$data['allData'] = StudentClass::all();
    	return view('backend.setup.student_class.view-class',$data);
    }

    public function add(){
    	return view('backend.setup.student_class.add-class');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:student_classes,name'
        ]);

    	$data = new StudentClass();
    	$data->name = $request->name;
        $data->save();
        
    	return redirect()->route('setups.student.class.view')->with('success','Data Inserted Successfully');
    }

    public function edit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.add-class',compact('editData'));
    }

    public function update(Request $request, $id){
        $data =StudentClass::find($id);
        $this->validate($request,[
            'name'=>'required|unique:student_classes,name,'.$data->id
        ]);

        
        $data->name = $request->name;
        $data->save();
        
        return redirect()->route('setups.student.class.view')->with('success','Data Updated Successfully');
    }

    public function delete(Request $request){
        $data = StudentClass::find($request->id);
        $data->delete();

        return redirect()->route('setups.student.class.view')->with('success','Data deleted Successfully');
    }
}
