<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\User;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentShift;
use App\Model\Year;
use App\Model\EmployeSalaryLog;
use App\Model\Designation;
use DB;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function view(){
    	$data['allData'] = User::where('usertype','employee')->get(); 
    	return view('backend.employee.employee_salary.view-employee-salary',$data);
    }
    public function increment($id){
        $data['editData'] = User::find($id);
    	return view('backend.employee.employee_salary.add-employee-salary',$data);
    }

    public function store(Request $request, $id){
    	$user = User::find($id);
    	$previous_selary = $user->salary;
    	$present_salary = (float)$previous_selary+(float)$request->increment_salary;
    	$user->salary = $present_salary;
    	$user->save();
    	$salaryData = new EmployeSalaryLog();
    	$salaryData->employee_id = $id;
    	$salaryData->previous_salary = $previous_selary;
    	$salaryData->increment_salary = $request->increment_salary;
    	$salaryData->present_salary = $present_salary;
    	$salaryData->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
    	$salaryData->save();
    	return redirect()->route('employees.salary.view')->with('success','Salary increment Successfully');

    		
    }

    public function details($id){
    	$data['details'] = User::find($id);
    	$data['salary_log'] = EmployeSalaryLog::where('employee_id',$data['details']->id)->get();
    	return view('backend.employee.employee_salary.employee-salary-details',$data);

    }
}
