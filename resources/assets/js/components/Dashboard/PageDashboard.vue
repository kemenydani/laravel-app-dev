<template>
	<div class="container-fluid">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">
		
					<input class="form-control" type="text" v-model="username" name="username">
					<br>
					<input class="form-control" type="text" v-model="password" name="password">
					<hr>
					<button @click.prevent="login">Login</button>
			
					<!--
					<passport-clients></passport-clients>
					<passport-authorized-clients></passport-authorized-clients>
					<passport-personal-access-tokens></passport-personal-access-tokens>
					-->
				</div>
			</div>
		</div>
		
		<app-modal button="true"></app-modal>
	</div>
</template>

<script>
	import AppModal from '../Global/AppModal.vue';
	
	export default {
		data() {
			return {
				modal_active: true,
				asd : false,
				username: 'kemenydani93@gmail.com',
				password: 'admin',
				isAuth: null
			}
		},
		methods: {
			login() {
				var data = {
					client_id: 2,
					client_secret: 'i6de5SUWAyAomc8JcLMWicxBkiSu6rl2EbDsN1xY',
					grant_type: 'password',
					username: this.username,
					password: this.password
				};
				axios.post('/laravel-app-dev/public/oauth/token', data)
					.then(response => {
						console.log(response.data);
						this.$auth.setToken(response.data.access_token, response.data.expires_in + Date.now());
					})
					.catch(e => {
					
					})
			},
			setAuthenticatedUser(){
				axios.get('/laravel-app-dev/public/api/user')
					.then(response => {
						this.$auth.setAuthenticatedUser(response.data);
						console.log(this.$auth.getAuthenticatedUser());
					})
					.catch(e => {
						//this.errors.push(e);
					})
			}
		},
		components: {
			AppModal
		},
		created() {
			this.isAuth = this.$auth.isAuthenticated();
			this.setAuthenticatedUser();
		}
	}
</script>

<style>

</style>
