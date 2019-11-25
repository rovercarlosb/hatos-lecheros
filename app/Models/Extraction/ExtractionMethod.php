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

	public function getExtractionsForMonth() {
		$actualMonth = Carbon::now()->month;
		$lapsus = ['Semana 1', 'Semana2', 'Semena3', 'Semana4', 'Semana5'];
		$registers = [];

		$monthExtractions = $this::whereMonth('date', $actualMonth)->get();

		foreach ($monthExtractions as $extraction) {

			$date = new Carbon($extraction->date);
			$value = $registers[$lapsus[$date->weekOfMonth - 1]] ?? 0;
			$registers[$lapsus[$date->weekOfMonth - 1]] = $value + $extraction->quantity;
		}

		return $registers;
	}

}

?>