<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function view(){
    	$data['allData'] = user::where('usertype','admin')->get();
    	return view('backend.user.view-user',$data);
    }

    public function add(){
    	return view('backend.user.add-user');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
            'email'=>'required|unique:users,email'
    	]);
        $code = rand(0000,9999);
    	$data = new User();
    	$data->usertype = 'admin';
        $data->role = $request->role;
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($code);
        $data->code = $code;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('users.view')->with('success','Data updated Successfully');
    	$data->save();
    	return redirect()->route('users.view')->with('success','Data Inserted Successfully');
    }

    public function edit($id){
        $editData = User::find($id);
        return view('backend.user.edit-user', compact('editData'));
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('users.view')->with('success','Data updated Successfully');
    }

    public function delete($id){
        $user = User::find($id);
        if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)) {
            unlink('public/upload/user_images/' . $user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success','Data deleted Successfully');
    }
    
}
