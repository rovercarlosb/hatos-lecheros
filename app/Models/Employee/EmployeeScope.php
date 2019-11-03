<?php

namespace App\Models\Employee;

trait EmployeeScope {

	public function scopePosition($query, $position) {

		return $query->where('position', '=', $position);
	}
}

?>