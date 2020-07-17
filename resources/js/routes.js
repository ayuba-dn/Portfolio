import VueRouter from 'vue-router';

let routes = [
    { path: '/', component: require('./components/PersonalSummary.vue').default },
    { path: '/experience', component: require('./components/Experience.vue').default },
    { path: '/awards', component: require('./components/Awards.vue').default },
    { path: '/education', component: require('./components/Education.vue').default },
    { path: '/skills', component: require('./components/Skills.vue').default },
    { path: '/interests', component: require('./components/Interests.vue').default }
];

export default new VueRouter({
  routes 
});