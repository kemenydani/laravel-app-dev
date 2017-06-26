<template>
	<section id="app-wrapper">
		<!-- Side Navigation -->
		<!--<app-side-navigation></app-side-navigation>-->
		<app-navigation></app-navigation>
		<!-- Page Content -->
		<section id="page-content-wrapper">
			<app-header></app-header>
			<!-- Breadcrumbs -->
			<div class="container-fluid">
				<app-breadcrumbs></app-breadcrumbs>
				<!-- Router output -->
				<transition enter-active-class="animated zoomIn">
				
		
							<router-view></router-view>
			
				
				</transition>
			</div>
		</section>
	</section>
</template>

<script>
	//import SideNavigation from './Global/SideNavigation.vue';
	import SideNavigation from './Base/Navigation.vue';
	import Breadcrumbs from './Breadcrumbs.vue';
	import Header from './Header.vue';
	
	export default {
		components: {
			'app-header' : Header,
			'app-breadcrumbs' : Breadcrumbs,
			'app-navigation' : SideNavigation
		},
		data() {
			return {}
		},
		props: {},
		mounted() {
			console.log('Application wrapper mounted.')
		}
	}
</script>

<style>
	
	#page-content-wrapper {
		width: 100%;
		background: #f7f7f7;
	}
	
	#app-wrapper {
		
		display: flex;
		position: relative;
		height: 100vh;
	}
</style>