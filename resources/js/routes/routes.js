import Game from "../components/Game";
import Settings from "../components/Settings";

const routes = [
    {
        path: '',
        component: Game
    }, {
        path: '/game',
        component: Game
    },
    {
        path: '/settings',
        component: Settings
    },
];

export default routes;