

// import './bootstrap';
import Vue from 'vue';


window.Vue = require('vue').default;

import ExampleComponent from './components/ExampleComponent.vue';
Vue.component('example-component', ExampleComponent);


const app = new Vue({
    render: h=>h(ExampleComponent),
}).$mount('#app');
