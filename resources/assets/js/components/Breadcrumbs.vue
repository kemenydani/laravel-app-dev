<template>
	<ol class="breadcrumb">
			<router-link to="/"><i class="fa fa-home"></i></router-link>
			<li v-for="param in location">{{ param }}</li>
	</ol>
</template>

<script>
	export default {
		data() {
			return {
				location : this.explodePath(this.$route.path)
			}
		},
		mounted() {
		
		},
		watch: {
			'$route': function(route){
				this.location = this.explodePath(route.path);
			}
		},
		methods: {
			explodePath(path) {
				return path.split('/');
			}
		}
	}
</script>

<style lang="scss"scoped>
	.breadcrumb {
		background: white;
		border: 1px solid #d9dee4;
	}
</style>
