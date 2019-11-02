<?php

namespace App\Models\Vaccine;

use App\Models\Vaccine\VaccineMutator;
use App\Models\Vaccine\VaccineRelationship;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model {

	use VaccineRelationship,
		VaccineMutator;

	protected $guarded = [];
	protected $appends = ['name_employee', 'code_cow'];
}
