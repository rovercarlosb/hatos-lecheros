<?php

namespace App\Models\Extraction;

trait ExtractionScope {

	public function scopeToday($query) {
		$query->whereDate('date', date('Y-m-d'));
	}
}
?>