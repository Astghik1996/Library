// import './bootstrap';
import Vue from 'vue';
import vuetify from "../plugins/vuetify";
import {ValidationObserver, ValidationProvider} from "vee-validate/dist/vee-validate.full.esm";
import VueRouter from 'vue-router'
import router from "../js/router";
import ExampleComponent from './components/ExampleComponent.vue';
import MainHeaderComponent from "./components/MainHeaderComponent";
import App from "./components/App"

Vue.use(VueRouter)

window.Vue = require('vue').default;
window.axios = require('axios');
Vue.component('example-component', ExampleComponent);
Vue.component('main-header-component', MainHeaderComponent);
Vue.component('App', App);
Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);


const app = new Vue({
    render: h => h(MainHeaderComponent),
    vuetify,
    router
}).$mount('#app');
