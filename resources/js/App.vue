<template>
	<div id="app">
		<transition name="slide-fade">
			<router-view></router-view>
		</transition>		
	</div>
</template>

<script>
	export default {
		name: 'app',
	}
</script>

<style>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active for <2.1.8 */ {
  transform: translateX(50px);
  opacity: 0;
}
</style>
