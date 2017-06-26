<template>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="container-fluid">
				<h1>Add User</h1>
				<hr>
		
				<form @submit.prevent>
					
					<input-field v-for="field in fields" :type="field.type" :name="field.name" :label="field.label"></input-field>
					
					<button @click.prevent="postAddUser()" class="btn btn-default">Create User</button>
				</form>
		
			</div>
		</div>
	</div>
</template>

<script>
	import InputField from '../Global/Input/InputField.vue';
	import ValidatorLogic from '../Mixin/ValidatorLogic.js';
	
	export default {
		components: {
			InputField,
			'test' : InputField
		},
		mixins: [
			ValidatorLogic
		],
		data() {
			return {
				errors: { },
				timeo: null,
				data: {
				
				},
				fields: [
					{
						type: 'text',
						name: 'name',
						label: 'Name field',
						placeholder: 'Placeholder for name'
					},
					{
						type: 'email',
						name: 'email',
						label: 'Email field',
						placeholder: 'Placeholder for email'
					},
					{
						type: 'number',
						name: 'age',
						label: 'Age field',
					}
				]
			}
		},
		
		methods:  {

		},
		
		mounted() {

		}
	}
</script>
