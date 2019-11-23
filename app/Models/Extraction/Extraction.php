<?php

namespace App\Models\Extraction;

use App\Models\Extraction\ExtractionMethod;
use App\Models\Extraction\ExtractionMutator;
use App\Models\Extraction\ExtractionRelationship;
use App\Models\Extraction\ExtractionScope;
use Illuminate\Database\Eloquent\Model;

class Extraction extends Model {

	use ExtractionRelationship,
	ExtractionMutator,
	ExtractionScope,
		ExtractionMethod;

	protected $guarded = [];
	protected $appends = ['name_employee', 'code_cow'];

}
