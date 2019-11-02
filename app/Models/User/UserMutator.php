<?php

namespace App\Models\User;

trait UserMutator {

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = bcrypt($value);
	}

	public function getRolUserAttribute() {
		$rol;
		$this->rol == 'admin' ? $rol = 'Administrador' : $rol = 'Empleado';
		return $rol;
	}
}

?>