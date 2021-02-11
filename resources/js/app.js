require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import AppComponent from "./AppComponent";
import router from "./router";
import store from "./store/store";
import * as filters from "./filters";


const app = new Vue({components: {AppComponent}, router, store, filters}).$mount('#app');
