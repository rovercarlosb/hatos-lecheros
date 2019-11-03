<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtractionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('extractions', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('employee_id')->unsigned();
			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
			$table->bigInteger('cow_id')->unsigned();
			$table->foreign('cow_id')->references('id')->on('cows')->onDelete('cascade');
			$table->float('quantity');
			$table->date('date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('extractions');
	}
}
