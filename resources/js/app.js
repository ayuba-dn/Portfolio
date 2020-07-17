/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import router from './routes';
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueNotification from "@kugatsu/vuenotification";

Vue.use(VueNotification, {
  timer: 20
});

window.Vue = require('vue');


  Vue.use(VueRouter);


Vue.component('personal-summary', require('./components/PersonalSummary.vue').default);
Vue.component('experience', require('./components/Experience.vue').default);
Vue.component('education', require('./components/Education.vue').default);
Vue.component('skills', require('./components/Skills.vue').default);
Vue.component('interests', require('./components/Interests.vue').default);
Vue.component('awards', require('./components/Awards.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
new Vue({
  router
}).$mount('#app');