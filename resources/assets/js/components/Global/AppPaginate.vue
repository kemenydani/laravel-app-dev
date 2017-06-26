<template>
	<ul class="pagination">
		<li v-if="hasPrev()"><a @click.prevent="changePage(currentPage - 1)" href="#"><span aria-hidden="true">«</span></a></li>
		<li v-for="page in totalPages" v-bind:class="[page === currentPage ? 'active' : '']"><a @click.prevent="changePage(page)" href="#">{{page}}</a></li>
		<li v-if="hasNext()"><a @click.prevent="changePage(currentPage + 1)" href="#"><span aria-hidden="true">»</span></a></li>
	</ul>
</template>

<script>
	export default {
		data() {
			return {
			
			}
		},
		props: {
			currentPage: {
				type: Number,
				default: 1
			},
			totalPages: {
				type: Number,
				default: 0
			},
			perPage: {
				type: Number,
				default: 10
			}
		},
		methods: {
			changePage: function(page) {
				this.$emit('page-changed', page);
			},
			hasPrev: function() {
				return this.currentPage > 1;
			},
			hasNext: function() {
				return this.currentPage < this.totalPages;
			},
		}
	}
</script>

<style>

</style>