<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class UserStoreRequest extends FormRequest {
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

		$id = get_model_id($this, 'id');

		if ($id) {
			return [
				'name' => 'required|string',
				'email' => 'required|email|unique:users,email,' . $id,
			];

		} else {
			return [
				'name' => 'required|string',
				'email' => 'required|email|unique:users',
				'password' => 'required|string|min:6|max:10',
			];

		}
	}

	public function messages() {

		return [
			'name.required' => 'El nombre es obligatorio',
			'email.required' => 'El Correo es obligatorio',
			'password.required' => 'La clave es obligatoria',
			'email.unique' => 'Este correo ya existe',
			'password.min' => 'La clave debe tener al menos 6 caracteres',

		];
	}

	public function response(array $errors) {
		if ($this->expectsJson()) {
			return new JsonResponse($errors, 422);
		}

		return $this->redirector->to($this->getRedirectUrl())
			->withInput($this->except($this->dontFlash))
			->withErrors($errors, $this->errorBag);
	}
}
