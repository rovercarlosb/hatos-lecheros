<?php

namespace App\Models\Vaccine;

trait VaccineMutator {

	public function getNameEmployeeAttribute() {
		return $this->employee->name;
	}

	public function getCodeCowAttribute() {
		return $this->cow->code;
	}

}

?>