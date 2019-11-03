<?php

namespace App\Models\Extraction;

use App\Models\Extraction\ExtractionMutator;
use App\Models\Extraction\ExtractionRelationship;
use Illuminate\Database\Eloquent\Model;

class Extraction extends Model {

	use ExtractionRelationship,
		ExtractionMutator;

	protected $guarded = [];
	protected $appends = ['name_employee', 'code_cow'];

}
