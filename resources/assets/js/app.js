
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

import vuedrag from 'vuedraggable'
Vue.component('draggable', require('vuedraggable'))

Vue.use(require('v-img'))

import editor from 'vue2-medium-editor'
Vue.component('medium-editor', editor)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('admin-tabs', require('./components/admin-tabs.vue'));
Vue.component('kontaktai', require('./components/kontaktai.vue'));

Vue.component('page', require('./components/page.vue'));
Vue.component('item-list', require('./components/item-list.vue'));
Vue.component('item', require('./components/item.vue'));
Vue.component('vue-table', require('./components/elements/table.vue'));
Vue.component('image-upload', require('./components/elements/image-upload.vue'));
Vue.component('multiple-image-upload', require('./components/elements/multiple-image-upload.vue'));

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
