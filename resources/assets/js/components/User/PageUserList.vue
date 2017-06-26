<template>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="container-fluid">
				<div class="row">
					<h1>Page Users</h1>
					<hr>
				</div>
				
				<div class="row">
					
					<div>
						<input type="number" v-model="perPage">
						<input type="text" v-model="filters.name.value">
						<button @click="fetchData(1, filters)" type="button">Filter</button>
					</div>
					
					<router-link to="/user/add"><button  class="btn btn-primary pull-right">Add User</button></router-link>
				</div>
				
				<hr>
				
				<div class="row">
					
					<table class="table">
						<thead>
						<tr>
							<th>Firstname</th>
							<th>Email</th>
							<th>Created At</th>
						</tr>
						</thead>
						<tbody>
						<tr v-for="user in users">
							<td>{{ user.name }}</td>
							<td>{{ user.email }}</td>
							<td>{{ user.created_at }}</td>
						</tr>
						</tbody>
					</table>
					
					<hr>
					
					<app-paginate
							:currentPage="pagination.current"
							:totalPages="pagination.total"
							:perPage="pagination.perPage"
							@page-changed="fetchData"
					></app-paginate>
					
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import AppPaginate from '../Global/AppPaginate.vue';
	import AppPaginateFilter from '../Global/AppPaginateFilter.vue';
	
	export default {
		data() {
			return {
				pagination: {
					total: 0,
					perPage: 10,
					current: 1,
					total: 0
				},
				totalItems: 0,
				perPage: 10,
				currentPage: 1,
				totalPages: 0,
				
				filters: {
					name : {
						column: 'name',
						method: '=',
						value: null
					},
					/*
					email : {
						column: 'email',
						method: '=',
						value: null
					},
					*/
				},
				
				users : [],
				errors: [],
			}
		},
		components: {
			AppPaginate,
			AppPaginateFilter
		},
		methods: {
			getFilledFilters() {
				var filters = [];
				$.each(this.filters, function(filter, index){
					if(filter.value !== null) filters.push(filter);
				});
				return filters;
			},
			fetchData(from_page, filters) {
				axios.get('/laravel-app-dev/public/api/users', {
						params: {
							from_page: from_page,
							per_page: this.pagination.perPage,
							filters: filters
						}
					})
					.then(response => {
						console.log(response);
						// List data
						this.users = response.data.data.data;
						// Pagination attributes
						this.pagination.current = response.data.pagination.current_page;
						this.pagination.total = response.data.pagination.last_page;
					})
					.catch(e => {
						this.errors.push(e);
					})
			}
		},
		created: function() {
			this.fetchData(this.pagination.current);
		}
	}
</script>

<style>
	.modal-mask {
		position: fixed;
		z-index: 9998;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, .5);
		display: table;
		transition: opacity .3s ease;
	}
	
	.modal-wrapper {
		display: table-cell;
		vertical-align: middle;
	}
	
	.modal-container {
		width: 300px;
		margin: 0px auto;
		padding: 20px 30px;
		background-color: #fff;
		border-radius: 2px;
		box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
		transition: all .3s ease;
		font-family: Helvetica, Arial, sans-serif;
	}
	
	.modal-header h3 {
		margin-top: 0;
		color: #42b983;
	}
	
	.modal-body {
		margin: 20px 0;
	}
	
	.modal-default-button {
		float: right;
	}
	
	/*
	 * The following styles are auto-applied to elements with
	 * transition="modal" when their visibility is toggled
	 * by Vue.js.
	 *
	 * You can easily play with the modal transition by editing
	 * these styles.
	 */
	
	.modal-enter {
		opacity: 0;
	}
	
	.modal-leave-active {
		opacity: 0;
	}
	
	.modal-enter .modal-container,
	.modal-leave-active .modal-container {
		-webkit-transform: scale(1.1);
		transform: scale(1.1);
	}
</style>
