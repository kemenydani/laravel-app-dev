import VueRouter from 'vue-router';

import Auth from './packages/auth/auth';

/**
 *
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app-wrapper', require('./components/Wrapper.vue'));
/**
 * Route configuration
 */
Vue.use(VueRouter);
Vue.use(Auth);

const ROUTES = [
	{ path: '/', component: require('./components/Dashboard/PageDashboard') },
	{ path: '/login', meta: { forVisitors: true }, component: require('./components/Dashboard/PageDashboard') },
	{ path: '/dashboard', component: require('./components/Dashboard/PageDashboard') },
	{ path: '/users', component: require('./components/User/PageUserList') },
	{ path: '/user/add', component: require('./components/User/PageAddUser') }
];
/*
ROUTES.beforeEach(function(to, from, next){
	if(to.matched.some(record => record.meta.forVisitors)){
		if(Vue.auth.isAuthenticated()){
		
		}
	}
});
*/
/*
Vue.component(
	'passport-clients',
	require('./components/passport/Clients.vue')
);

Vue.component(
	'passport-authorized-clients',
	require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
	'passport-personal-access-tokens',
	require('./components/passport/PersonalAccessTokens.vue')
);
*/
export const EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router : new VueRouter({
	    routes: ROUTES
    })
});
