<template>
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hatos-lecheros</a>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a href="#" class="nav-link" @click.prevent="$auth.logout()">Salir</a>
			</li>
		</ul>
	</nav>
</template>

<script>
export default {
	name: "HeaderPartial",

	data() {
		return {};
	}
};
</script>

<style lang="css" scoped></style>
