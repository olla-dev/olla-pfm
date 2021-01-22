import Vue from 'vue'
import Router from 'vue-router'
import { generateUrl } from '@nextcloud/router'

import Dashboard from '../views/Dashboard.vue'
import About from '../views/About.vue'
import LoyaltyCards from '../views/LoyaltyCards.vue'
import LoyaltyCardDetails from '../views/LoyaltyCardDetails.vue'

Vue.use(Router)

export default new Router({
	mode: 'history',
	base: generateUrl('/apps/ollabudgetmanager'),
	routes: [
		{
			path: '/',
			name: 'dashboard',
			component: Dashboard,
		},
		{
			path: '/about',
			name: 'about',
			component: About,
		},
		{
			path: '/loyaltycards',
			name: 'loyaltycards',
			component: LoyaltyCards,
			children: [
				{
					path: ':id',
					component: LoyaltyCardDetails,
				},
			],
		},
	],
})
