<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CowStoreRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		$id = get_model_id($this, 'cow');

		if ($id) {
			return [
				'weight' => 'required|between:0,99999.99',
				'code' => 'required|unique:cows,code,' . $id,
			];

		} else {
			return [
				'weight' => 'required|between:0,99999.99',
				'code' => 'required|unique:cows',
			];

		}
	}

	public function messages() {

		return [
			'weight.required' => 'El peso es obligatorio',
			'code.unique' => 'Este codigo ya existe',

		];
	}

}
