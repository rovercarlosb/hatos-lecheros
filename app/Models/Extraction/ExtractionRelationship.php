<?php

namespace App\Models\Extraction;

use App\Models\Cow\Cow;
use App\Models\Employee\Employee;

trait ExtractionRelationship {

	public function cow() {
		return $this->belongsTo(Cow::class);
	}

	public function employee() {
		return $this->belongsTo(Employee::class);
	}
}

?>