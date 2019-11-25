<script>
import VueChartJS from 'vue-chartjs'

export default {
  name: 'Chart',
  extends: VueChartJS.Line,
  props: ["chartData", "options"],
  mixins: [VueChartJS.mixins.reactiveProp],

  mounted () {
    this.$refs.canvas.id = Math.random();
    this.renderChart(this.chartdata, this.options)

  },

  methods: {
  	refresh(){
	    this.$refs.canvas.width = 300;   
		this.$refs.canvas.height = 300;     		
	    this.$refs.canvas.style = 'display: block; width: 396px; height: 400px;';     		
  	}
  }
}</script>

<style lang="css" scoped>
</style>