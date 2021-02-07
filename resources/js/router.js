import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import routes from "./routes/routes";
import Game from "./components/Game";
import Settings from "./components/Settings";

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '',
            component: Game
        },
        {
            path: '/settings',
            component: Settings
        },
    ]
})
