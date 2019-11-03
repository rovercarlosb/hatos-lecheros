<template>
	<form>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Nombre completo</span>
			</div>
			<input
				type="text"
				class="form-control"
				placeholder="Nombre completo"
				aria-label="Nombre"
				aria-describedby="basic-addon1"
				v-model="form.name"
				required
			/>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon2">Cedula ( ingresa solo los numeros )</span>
			</div>

			<input
				type="number"
				min="7"
				max="8"
				class="form-control"
				placeholder="Cedula"
				aria-label="Cedula"
				aria-describedby="basic-addon2"
				v-model="form.identificacion_number"
				required
			/>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon3"
					>Fecha de nacimiento</span
				>
			</div>
			<input
				type="date"
				class="form-control"
				placeholder="Fecha de nacimiento"
				aria-label="Fecha de nacimiento"
				aria-describedby="basic-addon3"
				v-model="form.date_birth"
				required
			/>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon4"
					>Cargo</span
				>
			</div>
			<select class="form-control" id="exampleFormControlSelect1" aria-describedby="basic-addon4" placeholder="Seleccionar" v-model="form.position" required>
				<option value="" selected>Seleccionar</option>
				<option value="worker">Obrero</option>
				<option value="extraccion">Extraccion</option>
				<option value="vaccination">Vacunacion</option>
				<option value="supplies">Insumos</option>
			</select>
		</div>
	</form>
</template>

<script>
import crudMixin from "@/mixins/crud.js";

export default {
	name: "FormEmployee",

	mixins: [crudMixin],

	data() {
		return {
			form: {
				id: "",
				name: "",
				identificacion_number: "",
				date_birth: "",
				position: ""
			},

			id: 'employees',
			deleteUrl: "/employee/delete",
			updateUrl: "/employee/update",
			createUrl: "/employee/register"
		};
	},

	created() {

	},

	methods: {

	}
};
</script>

<style lang="css" scoped></style>
