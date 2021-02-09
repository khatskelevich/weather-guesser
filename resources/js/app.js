require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import router from "./router";
import store from "./store/store";


const app = new Vue({router, store}).$mount('#app');
