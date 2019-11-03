<?php

namespace App\Http\Controllers;

use App\Http\Requests\CowStoreRequest;
use App\Models\Cow\Cow;
use Illuminate\Http\Request;

class CowController extends Controller {

	public function countTotal() {

		$total = Cow::count();

		return response([
			'status' => 'success',
			'data' => $total,
		], 200);

	}

	public function statisticsCows() {

		$statistics = Cow::cowStatistics();

		return response([
			'status' => 'success',
			'data' => $statistics,
		], 200);

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($milking = null) {
		if ($milking) {
			$cows = Cow::milking()->get();
		} else {
			$cows = Cow::all();
		}

		return response([
			'status' => 'success',
			'data' => $cows,
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
	public function register(CowStoreRequest $request) {
		$cow = new Cow();
		$cow->create($request->except('_token'));

		return response([
			'status' => 'success',
			'data' => $cow,
		], 200);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Cow\Cow  $cow
	 * @return \Illuminate\Http\Response
	 */
	public function show(Cow $cow) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Cow\Cow  $cow
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Cow $cow) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Cow\Cow  $cow
	 * @return \Illuminate\Http\Response
	 */
	public function update(CowStoreRequest $request, Cow $cow) {
		$cow->update($request->all());
		return response([
			'status' => 'success',
			'data' => $cow,
		], 200);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Cow\Cow  $cow
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Cow $cow) {
		$cow->delete();
		return response([
			'status' => 'success',
			'data' => $cow,
		], 200);

	}
}
