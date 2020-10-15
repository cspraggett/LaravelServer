<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departments()
    {
        return $this->belongsToMany('App\Department', 'dept_manager', 'emp_no', 'dept_no','emp_no', 'dept_no')
            ->withPivot('from_date', 'to_date');
    }

    public function salary()
    {
        return $this->hasMany('App\Salary', 'emp_no', 'emp_no');
    }
    public $timestamps = false;
    protected $table = 'employees';
}
