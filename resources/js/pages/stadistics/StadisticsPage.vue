<template>
	<admin-layout>
		<template v-slot:header>
			<h3 class="text-center">ESTADISTICAS</h3>
		</template>

		<template v-slot:body>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="week-tab" data-toggle="tab" href="#week" role="tab" aria-controls="week" aria-selected="true">Extraccion de la semana</a>
			  </li>
			  <li class="nav-item" @click.once="refreshChart">
			    <a class="nav-link" id="month-tab" data-toggle="tab" href="#month" role="tab" aria-controls="month" aria-selected="false">Extraccion del mes</a>
			  </li>
<!-- 			  <li class="nav-item">
			    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
			  </li>
 -->			</ul>

			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="week" role="tabpanel" aria-labelledby="week-tab">
  					<div class="row">
						<div class="col-md-8 offset-2">
							<br>
							<h5 class="text-center"> Extraccion de leche de esta semana por litro</h5>
							<chart :chart-data="weekData" :options="options"></chart>											
						</div>
					</div>
			  </div>
			  <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">
  					<div class="row">
						<div class="col-md-8 offset-2">
							<br>
							<h5 class="text-center"> Extraccion de leche de este mes por litro</h5>
							<chart ref="chart" :chart-data="monthData" :options="options"></chart>											
						</div>
					</div>
			  </div>
<!-- 			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
 -->			</div>								
			
		</template>
	</admin-layout>
</template>

<script>
import AdminLayout from "@/layouts/AdminLayout.vue";
import Chart from "@/components/Chart.vue";

export default {
	name: "StadisticsPage",

	data: () =>({

			weekData: null,
			monthData: null,
		    options: { responsive: true, maintainAspectRatio: false },
			fetchExtractionsUrl: "/extractions/stadistics",
	}),

	components: {
		AdminLayout,
		Chart,
	},

	methods: {
		fetchExtractionsStadistics(url) {
			axios.get(url).then(response => {
				this.setWeekData(response.data.week_extractions);
				this.setMonthData(response.data.month_extractions);

			});
		},


		setWeekData(data) {
		        this.weekData = {
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
		    },

		setMonthData(data) {
		        this.monthData = {
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
		              label: "Semanas",
		              backgroundColor: 'blue',
		              // data: [40, 39, 10, 40, 39, 80, 40]
		              data: Object.values(data)
		            }
		          ]
		        };
		    },

		    refreshChart(){
		    	this.$refs.chart.refresh();
		    }
		},

	created() {
		this.fetchExtractionsStadistics(this.fetchExtractionsUrl);
	},

	computed: {
	}
};
</script>

<style lang="css" scoped></style>
