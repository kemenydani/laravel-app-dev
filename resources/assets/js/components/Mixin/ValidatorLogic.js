var mixin = {
	methods: {
		validate(field, value) {
			console.log(field, value);
		},
		watchInput(field, value) {
			clearTimeout(this.timeo);
			var self = this;
			this.timeo = setTimeout(function(){
				self.validate(field, value);
			}, 2000);
		}
	}
}

export default mixin;