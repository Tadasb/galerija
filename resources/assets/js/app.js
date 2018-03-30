
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import elementUI from 'element-ui'
import lang from 'element-ui/lib/locale/lang/lt'
import locale from 'element-ui/lib/locale'
import 'element-ui/lib/theme-chalk/index.css'
locale.use(lang)
Vue.use(elementUI)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('admin-tabs', require('./components/admin-tabs.vue'));
Vue.component('parodos', require('./components/parodos.vue'));
Vue.component('menininkai', require('./components/menininkai.vue'));
Vue.component('renginiai', require('./components/renginiai.vue'));
Vue.component('dizainas', require('./components/dizainas.vue'));
Vue.component('fotografija', require('./components/fotografija.vue'));
Vue.component('dirbtuves', require('./components/dirbtuves.vue'));
Vue.component('menu-ledai', require('./components/menu-ledai.vue'));
Vue.component('kontaktai', require('./components/kontaktai.vue'));

const app = new Vue({
    el: '#app',
    data() {
    	return {
    		navbar_active: false
    	}
    },

    methods: {
    	toggleNavbar() {
    		this.navbar_active = !this.navbar_active
    	}
    }
});
