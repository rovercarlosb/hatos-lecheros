<template>
	<admin-layout>
		<template v-slot:header>
			<h3 class="text-center">ESTADISTICAS</h3>
		</template>

		<template v-slot:body>
			<div class="row">
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
			</div>
			
			<br>
			
			<div class="row">
				<div class="col-md-8 offset-2">
					<h5 class="text-center"> Extraccion de leche de esta semana por litro</h5>
					<chart :chart-data="chartData" :options="options"></chart>											
				</div>
			</div>

		</template>
	</admin-layout>
</template>

<script>
import AdminLayout from "@/layouts/AdminLayout.vue";
import Card from "@/components/Card.vue";
import Chart from "@/components/Chart.vue";

export default {
	name: "HomePage",

	data: () =>({

			chartData: null,
		    options: { responsive: true, maintainAspectRatio: false },
			extractions: [],
			totalCows: 0,
			fetchExtractionsUrl: "/extractions/stadistics",
			fetchTotalCowsUrl: "/cows/total",
			loaded: true
	}),

	components: {
		AdminLayout,
		Card,
		Chart,
	},

	methods: {
		fetchExtractionsStadistics(url) {
			axios.get(url).then(response => {
				this.setChartData(response.data.week_extractions);
				this.extractions = response.data.today_extractions;
			});
		},

		fetchTotalCows(url) {
			axios.get(url).then(response => {
				this.totalCows = response.data.data;
			});
		},

		setChartData(data) {
		        this.chartData = {
		          // labels: [
		          //   "January",
		          //   "February",
		          //   "March",
		          //   "April",
		          //   "May",
		          //   "June",
		          //   "July"
		          // ],
		          labels: Object.keys(data),
		          datasets: [
		            {
		              label: "Dias de la semana",
		              backgroundColor: 'green',
		              // data: [40, 39, 10, 40, 39, 80, 40]
		              data: Object.values(data)
		            }
		          ]
		        };
		    }
		},

	created() {
		this.fetchExtractionsStadistics(this.fetchExtractionsUrl);
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
