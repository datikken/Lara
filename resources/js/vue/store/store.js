import Vue from 'vue'
import Vuex from 'vuex'
import state from './state/state';
import getters from './getters/getters';
import actions from './actions/actions';
import mutations from './mutations/mutations'

Vue.use(Vuex)

const store = new Vuex.Store({
    state,
    getters,
    actions,
    mutations
})

export default store
