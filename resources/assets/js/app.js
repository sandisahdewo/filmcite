
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Vuex is a state management pattern + library for Vue.js applications.
 * It serves as a centralized store for all the components in an application,
 * with rules ensuring that the state can only be mutated in a predictable fashion.
 * It also integrates with Vue's official devtools extension to provide advanced features
 * such as zero-config time-travel debugging and state snapshot export / import.
 */

import store from './vuex/store';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navigation', require('./components/Navigation.vue'));
Vue.component('film-search', require('./components/film/Search.vue'));
Vue.component('film-quote', require('./components/film/Quote.vue'));
Vue.component('film-rate', require('./components/film/Rate.vue'));
Vue.component('form-quote', require('./components/film/Form.vue'));

const app = new Vue({
	store,
    el: '#app'
});
