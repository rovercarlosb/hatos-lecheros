<?php

namespace App\Models\User;

trait UserMutator {

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = bcrypt($value);
	}
}

?>