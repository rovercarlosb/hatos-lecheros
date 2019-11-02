<?php

namespace App\Models\Cow;

trait CowMutator {

	public function getOrdenoAttribute() {

		return $this->milking ? 'Si' : 'No';
	}
}

?>