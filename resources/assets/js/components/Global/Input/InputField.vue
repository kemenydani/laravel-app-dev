<template>
	<!--
	<section v-bind:class="[hasSuccess ? 'has-success' : '', hasError ? 'has-error' : '', hasWarning ? 'has-warning' : '']">
		<label v-if="label" :for="name">{{ label }}</label>
		<input type="text"
		       class="form-control"
		       :placeholder="placeholder"
		       :name="name"
		       :disabled="disabled"
		       v-model="field_value">
	</section>
	-->
	<div id="mount"></div>
</template>

<script>
	import TextField from './TextField.vue';
	
	export default {
		props: {
			/* required */
			name: { type: String, required: true },
			type: { type: String, required: true },
			/* info */
			placeholder: { type: String, default: '' },
			label: { type: String, default: '' },
			/* availability */
			disabled: { type: Boolean, default: false },
			/* state indicators */
			hasError : { type: Boolean, default: false },
			hasWarning : { type: Boolean, default: false },
			hasSuccess : { type: Boolean, default: false },
			/* validation */
			validator : { default: null }
		},
		components: {
			'text-field' : TextField
		},
		methods: {
			atInput() {
				if(this.validator !== null){
					this.validator(this.name, this.field_value);
				}
			},
		},
		data() {
			return {
				field_value : null
			}
		},
		mounted() {
			
			var ext = Vue.extend(TextField);
			new ext;
		
			const InputComponent = Vue.extend(ext);
			new InputComponent({
				propsData: {
					text: this.name
				}
			}).$mount('#mount');
		}
	}
</script>
