<template>
	<form @submir.prevent="addUser">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">@</span>
			</div>
			<input
				type="text"
				class="form-control"
				placeholder="Nombre"
				aria-label="Nombre"
				aria-describedby="basic-addon1"
				v-model="form.name"
			/>
		</div>

		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon2"
					>@example.com</span
				>
			</div>

			<input
				type="email"
				class="form-control"
				placeholder="Correo"
				aria-label="Correo"
				aria-describedby="basic-addon2"
				v-model="form.email"
			/>
		</div>
		<div class="input-group mb-3" v-if="!form.id">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon3"
					>Contraseña</span
				>
			</div>
			<input
				type="password"
				class="form-control"
				placeholder="Contraseña"
				aria-label="Contraseña"
				aria-describedby="basic-addon3"
				v-model="form.password"
			/>
		</div>
		<div class="input-group mb-3" v-if="!form.id">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon4"
					>Confimar contraseña</span
				>
			</div>
			<input
				type="password"
				class="form-control"
				placeholder="confirmar"
				aria-label="confirmar"
				aria-describedby="basic-addon4"
				v-model="form.confirmPassword"
			/>
		</div>
	</form>
</template>

<script>
import crudMixin from '@/mixins/crud.js';

export default {

	name: "FormUser",

	mixins: [crudMixin],

	data() {
		return {
			form: {
				id: "",
				name: "",
				email: "",
				password: "",
				confirmPassword: ""
			},

			id: 'users',
			deleteUrl: '/user/delete',
			updateUrl: '/user/update',
			createUrl: 'auth/register',

		};
	},

	created() {

		this.$bus.$on("data", ({ data, event }) => {
			this.form.name = data.name;
			this.form.email = data.email;
			this.form.id = data.id;
			this.form.password = "";
			this.form.confirmPassword = "";

			if(event){
				//Si se manda event como true, se ejecuta automatico el evento de eliminar
				this.delete(this.deleteUrl);

			}
		});

	},

	methods: {

		register(url) {
			var app = this;

			if (app.form.password != app.form.confirmPassword) {
				swal("Error", "Las contraseñas no coinciden", "error");
				return;
			}

			this.$auth.register({
				data: {
					name: app.form.name,
					email: app.form.email,
					password: app.form.password
				},
				success: function() {
					swal(
						"Exelente",
						"Usuario registrado correctamente",
						"success"
					).then(value => {
						utils.reload();
					});
				},
				error: function(data) {
					swal("Error", "Este usuario ya existe", "error");
				},
				redirect: null
			});
		},

		resetForm() {
			this.form.id = null;
			this.form.name = "";
			this.form.email = "";
			this.form.password = "";
			this.form.confirmPassword = "";
		}
	}
};
</script>

<style lang="css" scoped></style>
