import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        score: 0,
        units: '',
        username: ''
    },
    getters: {
        getUnits(state){
            return state.units;
        }
    },
    mutations: {
        increment(state) {
            state.score++;
        },
        units: (state, units) => {
            state.units = units;
        },
        username: (state, username) => {
            state.username = username;
        }
    },
    actions: {
        setUnits({commit}, val) {
            commit('units', val);
        },
        setUsername({commit}, val) {
            commit('username', val);
        }
    }
});