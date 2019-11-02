<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaccineStoreRequest;
use App\Models\Vaccine\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$vaccines = Vaccine::all();

		return response([
			'status' => 'success',
			'data' => $vaccines,
		], 200);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function register(VaccineStoreRequest $request) {

		$vaccine = new Vaccine();
		$vaccine->create($request->except('_token'));

		return response([
			'status' => 'success',
			'data' => $vaccine,
		], 200);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Vaccine  $vaccine
	 * @return \Illuminate\Http\Response
	 */
	public function show(Vaccine $vaccine) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Vaccine  $vaccine
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Vaccine $vaccine) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Vaccine  $vaccine
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Vaccine $vaccine) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Vaccine  $vaccine
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Vaccine $vaccine) {
		$vaccine->delete();

		return response([
			'status' => 'success',
			'data' => $vaccine,
		], 200);
	}
}
