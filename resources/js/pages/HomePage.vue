<template>
	<admin-layout>
		<template v-slot:header>
			<h3 class="text-center">ESTADISTICAS</h3>
		</template>

		<template v-slot:body>
			<div class="col-md-6">
				<card header="Litros ordeñados del dia" title="Cantidad">
					<b>{{ milkExtratedToday }} lts</b>
				</card>
			</div>
			<div class="col-md-6">
				<card header="Numero actual de reses del hato" title="Cantidad">
					<b>{{ totalCows }}</b>
				</card>
			</div>
		</template>
	</admin-layout>
</template>

<script>
import AdminLayout from "@/layouts/AdminLayout.vue";
import Card from "@/components/Card.vue";

export default {
	name: "HomePage",

	data: () =>({

			extractions: [],
			totalCows: 0,
			fetchExtractionsTodayUrl: "/extractions/today",
			fetchTotalCowsUrl: "/cows/total",
			loaded: true
	}),

	components: {
		AdminLayout,
		Card,
	},

	methods: {
		fetchExtractionsToday(url) {
			axios.get(url).then(response => {
				this.extractions = response.data.data;
			});
		},

		fetchTotalCows(url) {
			axios.get(url).then(response => {
				this.totalCows = response.data.data;
			});
		},
	},

	created() {
		this.fetchExtractionsToday(this.fetchExtractionsTodayUrl);
		this.fetchTotalCows(this.fetchTotalCowsUrl);
	},

	computed: {
		milkExtratedToday: function() {
			let totalMilk = 0;
			this.extractions.forEach(ele => {
				totalMilk += ele.quantity;
			});

			return totalMilk;
		}
	}
};
</script>

<style lang="css" scoped></style>
