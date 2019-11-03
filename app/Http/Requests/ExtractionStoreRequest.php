<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtractionStoreRequest extends FormRequest {
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

		$id = get_model_id($this, 'extraction');

		if ($id) {
			return [
				'quantity' => 'required|between:0,99999.99',
			];

		} else {
			return [
				'quantity' => 'required|between:0,99999.99',
			];

		}
	}

	public function messages() {

		return [
			'quantity.required' => 'La cantidad es obligatoria',

		];
	}}
