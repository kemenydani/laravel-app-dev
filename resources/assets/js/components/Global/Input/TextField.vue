<template>
	<div class="hello">asdasda {{ text }}</div>
</template>

<script>
	export default {
		props: ['text'],
		mounted() {
			console.log('Text field mounted.')
		}
	}
</script>
