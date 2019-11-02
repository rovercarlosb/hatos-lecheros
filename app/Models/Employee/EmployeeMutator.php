<?php

namespace App\Models\Employee;
use Carbon\Carbon;

trait EmployeeMutator {

	public function getAgeAttribute() {
		$age = Carbon::parse($this->date_birth)->age;
		return $age;
	}

	public function getCargoAttribute() {
		$position = '';

		switch ($this->position) {
		case 'worker':
			$position = 'Obrero';
			break;
		case 'extraccion':
			$position = 'Extraccion';
			break;
		case 'vaccination':
			$position = 'Vacunacion';
			break;
		case 'supplies':
			$position = 'Insumos';
			break;
		}

		return $position;
	}

	public function setDateBirthAttribute($value) {
		$this->attributes['date_birth'] = Carbon::parse($value)->format('Y/m/d');
	}
}

?>