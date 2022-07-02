import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loadingImgSrc: ''
    },
    getters: {
        getLoadingImgSrc(state) {
            return state.loadingImgSrc;
        }
    },
    mutations: {
        setLoadingImgSrc(state, payload) {
            state.loadingImgSrc = payload;
        }
    }
});
