<template>
	<section id="app-navigation" :class="{ opened : is_open }">
		<!-- toggles the navigation -->
		<app-toggle class="toggle hidden-xs"></app-toggle>
		
		<ul class="main-menu">
			<!-- Level #1 -->
			<li v-for="menu_item in menu">
				<!-- Menu title -->
				<div class="item-header" @click="toggleSubMenu(menu_item)" v-if="menu_item.sub_items">
					<i :class="menu_item.icon"></i>
					<div class="title">{{ menu_item.name }}</div>
					<i v-bind:class="[is_open && menu_item.is_open ? 'fa fa-chevron-up' : 'fa fa-chevron-down']"></i>
				</div>
				<router-link active-class="active" :to="menu_item.to" class="item-header" tag="div" v-else exact>
					<i :class="menu_item.icon"></i>
					<div class="title">{{ menu_item.name }}</div>
				</router-link>
				<!-- Dropdown -->
			
				<ul v-toggle-submenu="(menu_item.is_open && is_open)" class="sub-menu" v-if="menu_item.sub_items">
					<!-- Dropdown items -->
					<router-link active-class="active" v-for="sub_item in menu_item.sub_items" tag="li" :to="sub_item.to" exact>{{ sub_item.name }}</router-link>
				</ul>
			
			</li>
		</ul>
		
	</section>
</template>

<script>
	import { EventBus } from '../../app';
	import Toggle from './Toggle.vue';
	
	export default {
		data() {
			return {
				is_open: false,
				menu: [
					{
						name : 'Dashboard',
						icon : 'fa fa-home',
						to: '/'
					},
					{
						name : 'Users',
						icon : 'fa fa-user',
						is_open : false,
						sub_items : [
							{
								name : 'Registered Users',
								to: '/users',
							},
							{
								name : 'Add User',
								to: '/user/add',
							}
						]
					},
					{
						name : 'Settings',
						icon : 'fa fa-cog',
						to: '/settings'
					},
					{
						name : 'Articles',
						icon : 'fa fa-newspaper-o',
						is_open : false,
						sub_items : [
							{
								name : 'All Articles',
								to: '/articles',
							},
							{
								name : 'New Article',
								to: '/article/add',
							}
						]
					}
				]
			}
		},
		directives: {
			'toggle-submenu' : {
				update: function (el, binding, vnode) {
					if(binding.value && binding.value){
						$(el).slideDown("fast");
					} else {
						$(el).slideUp("fast");
					}
				},
			}
		},
		components: {
			'app-toggle': Toggle
		},
		methods: {
			toggleSubMenu(menu_item){
				if(!this.is_open){
					this.is_open = !this.is_open;
				}
				menu_item.is_open = !menu_item.is_open;
			}
		},
		created() {
			var self = this;
			EventBus.$on('ToggleNavigation', function() {
				self.is_open = !self.is_open;
			});
		},
		mounted() {
		
		}
	}
</script>

<style lang="scss" scoped>
	#app-navigation {
		background: #2c3e50;
		width: 52px;
		height: 100%;
		overflow: hidden;
		color: white;
		/* opening transition */
		transition-property: width;
		transition-duration: .5s;
		transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
		
		@media (max-width: 767px) {
			width: 0px;
			position: fixed;
			z-index: 10000;
			max-width: 60vw;
		}
		
		.active {
			background: #1a252f;
			-webkit-transition: background 300ms linear;
			-ms-transition: background 300ms linear;
			transition: background 300ms linear;
		}
		
		.toggle {
			&:hover{
				background: #1a252f;
				-webkit-transition: background 300ms linear;
				-ms-transition: background 300ms linear;
				transition: background 300ms linear;
			}
		}
		
		/* toggle - is_open:true */
		&.opened { width: 300px; }
		
		a { text-decoration: none; color: white; }
		
		ul { list-style-type: none; padding-left: 0px;}
		
		.main-menu {

			> li {

				.item-header {
					height: 52px;
					line-height: 52px;
					display: flex;
					flex-direction: row;
					justify-content: space-between;
					cursor: pointer;
					padding: 0px 0px 0px 0px;
					align-items: center;
					position: relative;
					i {
						text-align: center;
						line-height: 52px;
						min-width: 52px;
						height: inherit;
					}
			
					&:hover {
						background: #1a252f;
						-webkit-transition: background 300ms linear;
						-ms-transition: background 300ms linear;
						transition: background 300ms linear;
					}
					.title {
						flex: 1;
					}
				}
				.sub-menu {
					display: flex;
					flex-direction: column;
					flex-wrap: nowrap;
					display: none;
					li {
						height: 40px;
						line-height: 40px;
						padding: 0px 0px 0px 52px;
						flex: 1;
						cursor: pointer;
						&:hover {
							background: #1a252f;
							-webkit-transition: background 300ms linear;
							-ms-transition: background 300ms linear;
							transition: background 300ms linear;
						}
					}
				}
			}
		}
		
		
	}
</style>