<?php

namespace App\Models\Employee;

use App\Models\Employee\EmployeeMutator;
use App\Models\Employee\EmployeeScope;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	use EmployeeMutator,
		EmployeeScope;

	protected $guarded = [];

	protected $appends = ['age', 'cargo'];

}
