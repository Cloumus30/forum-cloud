require('./bootstrap');
// Require Vue
import Vue from 'vue';
import example from './components/ExampleComponent';
// Register Vue Components
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Initialize Vue
const app = new Vue({
    el: '#app',
    components:{
        example
    }
});
