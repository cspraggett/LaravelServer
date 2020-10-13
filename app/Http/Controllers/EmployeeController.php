<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployeeById($id) {
        return Employee::where('emp_no', $id)->get();
    }

    public function getEmployee(Request $request) {
        $gender = $request->gender;
        $date = $request->hire_date;

        return Employee::take(10)
            ->where('gender', $gender)
            ->where('hire_date', '>=', $date)
            ->get();
    }

    public function store (Request $request) {
        $employee = new Employee;
        $employee->emp_no = $request->emp_no;
        $employee->birth_date = $request->birth_date;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->gender = $request->gender;
        $employee->hire_date = $request->hire_date;

        $employee->save();
    }
}
