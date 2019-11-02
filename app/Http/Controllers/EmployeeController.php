<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Employee\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($vaccination = null) {

		if ($vaccination) {
			$employees = Employee::vaccination()->get();
		} else {
			$employees = Employee::all();
		}

		return response([
			'status' => 'success',
			'data' => $employees,
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
	public function register(EmployeeStoreRequest $request) {
		$employee = new Employee();
		$employee->create($request->except('_token'));

		return response([
			'status' => 'success',
			'data' => $employee,
		], 200);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function show(Employee $employee) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Employee $employee) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function update(EmployeeStoreRequest $request, Employee $employee) {
		$employee->update($request->all());

		return response([
			'status' => 'success',
			'data' => $employee,
		], 200);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Employee  $employee
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Employee $employee) {
		$employee->delete();

		return response([
			'status' => 'success',
			'data' => $employee,
		], 200);

	}
}
