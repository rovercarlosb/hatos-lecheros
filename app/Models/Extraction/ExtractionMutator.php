<?php

namespace App\Models\Extraction;

trait ExtractionMutator {

	public function getNameEmployeeAttribute() {
		return $this->employee->name ?? '';
	}

	public function getCodeCowAttribute() {
		return $this->cow->code ?? '';
	}

}

?>