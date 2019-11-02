<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCowsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cows', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->enum('type', ['girolando', 'holstein', 'brahman', 'pardo_suizo']);
			$table->float('weight');
			$table->year('year_birth');
			$table->string('code');
			$table->boolean('milking')->default(true);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('cows');
	}
}
