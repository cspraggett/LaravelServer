<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{

    public function employees()
    {
        return $this->belongsToMany('App\Employee', 'dept_manager', 'dept_no', 'emp_no','dept_no', 'emp_no')
            ->withPivot('from_date', 'to_date');
    }

    public function scopeGetDepartments()
    {

        //        return DB::select( DB::raw("select departments.dept_name, departments.dept_no, dept_manager.emp_no, employees.first_name, employees.last_name
//from departments
//join dept_manager on departments.dept_no = dept_manager.dept_no
//join employees on dept_manager.emp_no = employees.emp_no"));

//        return DB::table('departments')
//            ->join('dept_manager', 'departments.dept_no', '=', 'dept_manager.dept_no')
//            ->join('employees', 'dept_manager.emp_no', '=', 'employees.emp_no')
//            ->select('departments.dept_name', 'departments.dept_no', 'dept_manager.emp_no', 'dept_manager.to_date', 'employees.first_name', 'employees.last_name')
//            ->get();

        return DB::select(DB::raw("select d.dept_name, d.dept_no, employees.first_name, employees.last_name
from departments as d
join (select dm.dept_no, emp_no, max(from_date) as maxDate
      from dept_manager as dm
               join (select dept_no, MAX(from_date) as maxDate
                     from dept_manager
                     group by dept_no) a on
                  dm.dept_no = a.dept_no and a.maxDate = dm.from_date
      group by dept_no) as dm on d.dept_no = dm.dept_no
join employees on dm.emp_no  = employees.emp_no
group by d.dept_no"));
    }

    protected $table = 'departments';
}
