
// import './bootstrap';
import Vue from 'vue';
import vuetify from "../plugins/vuetify";


window.Vue = require('vue').default;

import ExampleComponent from './components/ExampleComponent.vue';
import MainHeaderComponent from "./components/MainHeaderComponent";
Vue.component('example-component', ExampleComponent);
Vue.component('main-header-component',MainHeaderComponent)



const app = new Vue({
    render: h=>h(MainHeaderComponent),
    vuetify,
}).$mount('#app');
