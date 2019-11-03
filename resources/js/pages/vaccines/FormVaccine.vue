<template>
	<form>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"
					>Nombre de la vacuna</span
				>
			</div>
			<input
				type="text"
				class="form-control"
				placeholder="Nombre completo"
				aria-label="Nombre"
				aria-describedby="basic-addon1"
				v-model="form.name_vacuna"
				required
			/>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon3"
					>Fecha de aplicación</span
				>
			</div>
			<input
				type="date"
				class="form-control"
				placeholder="Fecha de aplicación"
				aria-label="Fecha de aplicación"
				aria-describedby="basic-addon3"
				v-model="form.date"
				required
			/>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">mg</span>
			</div>
			<input
				type="text"
				class="form-control"
				placeholder="Cantidad aplicada"
				aria-label="Nombre"
				aria-describedby="basic-addon1"
				v-model="form.quantity"
				required
			/>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon4"
					>Vacunador</span
				>
			</div>

			<p
				v-if="employees.length < 1"
				class="form-control"
				aria-describedby="basic-addon4"
			>
				<b>No hay vacunadores disponibles</b>
			</p>

			<select
				class="form-control"
				id="exampleFormControlSelect1"
				aria-describedby="basic-addon4"
				placeholder="Seleccionar"
				v-model="form.employee_id"
				required
				v-for="employee in employees"
				:key="employee.id"
			>
				<option value="" selected="">Seleccionar</option>
				<option :value="employee.id">{{ employee.name }}</option>
			</select>
		</div>
	</form>
</template>

<script>
import crudMixin from "@/mixins/crud.js";

export default {
	name: "FormVaccine",

	mixins: [crudMixin],

	data() {
		return {
			form: {
				id: "",
				employee_id: "",
				cow_id: "",
				name_vacuna: "",
				date: "",
				quantity: ""
			},

			employees: [],

			deleteUrl: "/vaccine/delete",
			updateUrl: "/vaccine/update",
			createUrl: "/vaccine/register",
			id: "vaccines",
			fecthEmployeesUrl: `/employees/vaccination`
		};
	},

	created() {
		this.$bus.$on("cow_id", ({ id }) => {
			this.form.cow_id = id;
		});

		this.fetchEmployees(this.fecthEmployeesUrl);
	},

	methods: {
		fetchEmployees(url) {
			axios.get(url).then(response => {
				this.employees = response.data.data;
			});
		}
	},

	updated(){
		this.$destroy();
	}
};
</script>

<style lang="css" scoped></style>
