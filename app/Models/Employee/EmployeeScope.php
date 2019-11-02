<?php

namespace App\Models\Employee;

trait EmployeeScope {

	public function scopeVaccination($query) {

		return $query->where('position', '=', 'vaccination');
	}
}

?>