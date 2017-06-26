<template>
	<div>
		<i @click="toggle()" class="sidebar-toggle fa fa-bars fa-2x"></i>
	</div>
</template>

<script>
	import { EventBus } from '../../app';
	
	export default {
		data() {
			return {
				//is_open : false
			}
		},
		props: {
		
		},
		methods: {
			toggle() {
				EventBus.$emit('ToggleNavigation');
			}
		}
	}
</script>

<style lang="scss"scoped>
	.sidebar-toggle {
		width: 52px;
		height: 52px;
		text-align: center;
		line-height: 52px;
		cursor: pointer;
	}
</style>