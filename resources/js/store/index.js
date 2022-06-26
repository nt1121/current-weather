import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        regions: {
            1: {id: 1, name: '北海道地方'},
            2: {id: 2, name: '東北地方'},
            3: {id: 3, name: '関東地方'},
            4: {id: 4, name: '中部地方'},
            5: {id: 5, name: '近畿地方'},
            6: {id: 6, name: '中国地方'},
            7: {id: 7, name: '四国地方'},
            8: {id: 8, name: '九州地方'}
        }
    },
    getters: {
        getRegions(state) {
            return state.regions;
        }
    },
    mutations: {

    },
    actions: {
        
    }
});