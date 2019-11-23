<script>
import VueChartJS from 'vue-chartjs'

export default {
  name: 'Chart',
  extends: VueChartJS.Line,
  props: ["chartData", "options"],
  mixins: [VueChartJS.mixins.reactiveProp],

  mounted () {
    this.renderChart(this.chartdata, this.options)
  }
}</script>

<style lang="css" scoped>
</style>