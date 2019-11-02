<?php

namespace App\Models\Cow;
use App\Models\Cow\CowMutator;
use Illuminate\Database\Eloquent\Model;

class Cow extends Model {
	use CowMutator;
	protected $guarded = [];
	protected $appends = ['ordeno'];
}
