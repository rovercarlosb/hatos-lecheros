<template>
	<div class="card text-center">
		<div class="card-header">
			{{ header }}
		</div>
		<div class="card-body">
			<h5 class="card-title">{{ title }}</h5>
			<p class="card-text">
				<slot></slot>
			</p>
		</div>
		<div class="card-footer text-muted">
			{{ footer }}
		</div>
	</div>
</template>

<script>
export default {
	name: "Card",

	data() {
		return {};
	},

	props: {
		header: {
			type: String,
			required: true
		},

		title: {
			type: String,
			required: true
		},

		footer: {
			typé: String
		}
	}
};
</script>

<style lang="css" scoped></style>
