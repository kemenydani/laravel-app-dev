<template>
	<nav id="page-header" class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<app-toggle class="header-toggle visible-xs"></app-toggle>
	
			<div class="navbar-header">
				<router-link class="navbar-brand" to="/">Admin Panel</router-link>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><router-link to="/">Dashboard</router-link></li>
					<li><router-link to="/users">Users</router-link></li>
					<li><router-link to="/user/add">Add User</router-link></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</template>

<script>
	import Toggle from './Base/Toggle.vue';
	
	export default {
		components: {
			'app-toggle' : Toggle
		},
		mounted() {
			console.log('Header mounted.')
		}
	}
</script>

<style lang="scss"scoped>
	.header-toggle{
		float: left;
	}
	.navbar {
		//min-height: 60px;
		background: white;
		border-top: 0px;
		border-radius: 0px;
		border-bottom: 1px solid #D9DEE4;
		> * {
			height: 100%;
		}
		
	}
</style>
