<template>
	<div>
		<input type="number" v-modelr="perPage">
		<button @click="applyFilter" type="button">Filter</button>
	</div>
	
</template>

<script>
	export default {
		data() {
			return {}
		},
		components: {},
		props: {
			perPage: {
				type: Number,
				default: 5
			},
		},
		methods: {
			applyFilter: function() {
				this.$emit('filter-applied', { })
			}
		},
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>

<style>

</style>