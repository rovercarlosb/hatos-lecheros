<?php

namespace App\Models\Extraction;
use Carbon\Carbon;

trait ExtractionMethod {

	public function getExtractionsForWeek($initialDate, $finalDate) {
		$days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
		$registers = [];
		$weekExtractions = $this::whereBetween('date', [$initialDate, $finalDate])->get();

		foreach ($weekExtractions as $extraction) {

			$date = new Carbon($extraction->date);
			$value = $registers[$days[$date->dayOfWeek]] ?? 0;
			$registers[$days[$date->dayOfWeek]] = $value + $extraction->quantity;
		}

		return $registers;
	}
}

?>