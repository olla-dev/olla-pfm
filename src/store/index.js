import Vue from 'vue'
import Vuex, { Store } from 'vuex'
import loyaltycards from './loyaltycards'

Vue.use(Vuex)

const mutations = {}

export default new Store({
	modules: {
		loyaltycards,
	},
	mutations,
})
