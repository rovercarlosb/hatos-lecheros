<?php

namespace App\Models\Cow;

trait CowScope {

	public function scopeMilking($query) {

		return $query->where('milking', '=', true);
	}
}

?>