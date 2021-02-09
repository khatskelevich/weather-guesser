import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        score: 0,
        units: ''
    },
    mutations: {
        increment(state) {
            state.score++;
        },
        units: (state, units) => {
            state.units = units;
        }
    },
    actions: {
        setUnits({commit}, val){
            commit('units', val);
        }
    }
});