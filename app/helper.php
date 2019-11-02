<?php

if (!function_exists('get_model_id')) {
	/**
	 * Extraer un parametro de la ruta, dependiendo del tipo de request
	 *
	 */
	function get_model_id($request, $parametro = "id") {
		return $request->getMethod() == "POST" ? null : $request->route()->parameters[$parametro]->id;
	}
}