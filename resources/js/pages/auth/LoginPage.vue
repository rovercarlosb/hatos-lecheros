<template>
	<body class="login" :background="background">
		<form
			class="form-signin mt-5 text-center"
			autocomplete="off"
			@submit.prevent="loginHandler"
			method="post"
		>
			<img
				class="mb-4 rounded"
				:src="image"
				alt=""
				width="72"
				height="72"
			/>
			<h1 class="h3 mb-3 font-weight-normal">Inicia sesión</h1>
			<label for="inputEmail" class="sr-only">Correo</label>
			<input
				type="email"
				id="inputEmail"
				class="form-control"
				placeholder="Correo"
				required
				autofocus
				v-model="form.email"
			/>
			<label for="inputPassword" class="sr-only">Contraseña</label>
			<input
				type="password"
				id="inputPassword"
				class="form-control"
				placeholder="Contraseña"
				required
				v-model="form.password"
			/>
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me" /> Recordar
					contraseña
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit">
				Entrar
			</button>
			<p class="mt-5 mb-3 text-white">&copy; 2019</p>
		</form>
 	</body>
</template>

<script>
export default {
	name: "LoginPage",
	data() {
		return {
			form: {
				email: "",
				password: ""
			},

			image: "/img/icon-vaca.png",
			background: "/img/ganado-background.jpg"
		};
	},
	methods: {
		loginHandler() {
			var app = this;
			this.$auth.login({
				params: {
					email: app.form.email,
					password: app.form.password
				},
				success: function() {},
				error: function() {
					swal("Hubo un error", "credenciales incorrectas", "error");
				},
				rememberMe: true,
				redirect: "/home",
				fetchUser: true
			});
		}
	}
};
</script>

<style lang="css" scoped>

.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
	.bd-placeholder-img-lg {
     font-size: 3.5rem;
	}
}

html,body{
  color:white;
  font-family:'Opens Sans',helvetica;
  height:70%;
  width:100%;
  margin: 0px;
}

body {
  -ms-flex-align: center;
  align-items: center;
  padding-top: 30px;
  padding-bottom: 7%;
}

.login{
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   height: 100%;
   width: 100% ;
   text-align: center;
}


.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.container {
  width: auto;
  max-width: 680px;
  padding: 0 15px;
}

</style>
