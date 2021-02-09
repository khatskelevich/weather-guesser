require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import router from "./router";
import store from "./store/store";
import * as filters from "./filters";


const app = new Vue({router, store, filters}).$mount('#app');
