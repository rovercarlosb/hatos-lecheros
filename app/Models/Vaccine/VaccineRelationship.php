<?php

namespace App\Models\Vaccine;

use App\Models\Cow\Cow;
use App\Models\Employee\Employee;

trait VaccineRelationship {

	public function cow() {
		return $this->belongsTo(Cow::class);
	}

	public function employee() {
		return $this->belongsTo(Employee::class);
	}
}

?>