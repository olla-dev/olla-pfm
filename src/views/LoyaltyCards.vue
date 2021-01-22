<template>
	<AppContent>
		<CategoryHeader category="loyaltycards" />
		<Multipane class="vertical-panes" layout="vertical">
			<div class="pane" :style="{ width: '25%' }">
				<div class="app-content-list-item">
					<button class="primary"
						@click="showCreateCardModal">
						<span class="icon icon-add-white" />
						{{ t('ollabudgetmanager', 'Add a loyalty card') }}
					</button>
				</div>
				<AppContentList>
					<router-link v-for="card in cards"
						:key="card.id"
						:to="`/loyaltycards/${card.id}`"
						:class="{active: isActive(card)}"
						class="app-content-list-item">
						<div class="app-content-list-item-icon"
							:style="iconStyle(`Card-${card.id}`)">
							{{ firstGrapheme(card.name) }}
						</div>
						<div class="app-content-list-item-line-one">
							{{ card.name }}
						</div>
					</router-link>
				</AppContentList>
			</div>
			<MultipaneResizer />
			<div class="pane" :style="{ width: '75%', maxWidth: '75%' }">
				<AppContentDetails>
					<router-view :key="$route.params.slug"/>
				</AppContentDetails>
			</div>
		</Multipane>
		<NewLoyaltyCard
			:modal="modal"
			@newLoyaltyCard="newLoyaltyCard"
			@closeModal="closeModal" />
	</AppContent>
</template>

<script>
import { Multipane, MultipaneResizer } from 'vue-multipane'
import AppContent from '@nextcloud/vue/dist/Components/AppContent'
import AppContentList from '@nextcloud/vue/dist/Components/AppContentList'
import AppContentDetails from '@nextcloud/vue/dist/Components/AppContentDetails'
import CategoryHeader from '../components/CategoryHeader'
import EmptyContent from '@nextcloud/vue/dist/Components/EmptyContent'
import NewLoyaltyCard from '../components/NewLoyaltyCard'
// import Avatar from '@nextcloud/vue/dist/Components/Avatar'

import '@nextcloud/dialogs/styles/toast.scss'

export default {
	name: 'LoyaltyCards',
	components: {
		Multipane,
		MultipaneResizer,
		AppContent,
		AppContentList,
		AppContentDetails,
		EmptyContent,
		CategoryHeader,
		NewLoyaltyCard,
		// Avatar,
	},
	data() {
		return {
			loading: false,
			modal: false,
			selectedLoyaltyCard: null,
		}
	},
	computed: {
		cards: {
			get() {
				return this.$store.state.loyaltycards.data
			},
		},
		loadingCards: {
			get() {
				return this.$store.state.cards.loading
			},
		},
	},
	mounted() {
		this.selectedLoyaltyCard = null
		this.$store.dispatch('loyaltycards/fetchLoyaltyCards')
	},
	methods: {
		showCreateCardModal() {
			this.modal = true
		},
		/**
		 * Create a new page and focus the page  automatically
		 */
		async newLoyaltyCard(payload) {
			try {
				await this.$store.dispatch('loyaltycards/create', {
					...payload,
				})
				this.closeModal()
			} catch (e) {
				console.error(e)
				showError(t('ollabudgetmanager', 'Could not create the loyalty card'))
			}
		},
		closeModal() {
			this.modal = false
		},
		isActive(card) {
			return this.selectedLoyaltyCard && this.selectedLoyaltyCard.id === card.id
		},
		iconStyle(id) {
			const c = id.toRgb()
			return `background-color: rgb(${c.r}, ${c.g}, ${c.b})`
		},
		// UTF8 friendly way of getting first 'letter'
		firstGrapheme(str) {
			return str[Symbol.iterator]().next().value
		},
		selectCard(card) {
			this.selectedLoyaltyCard = card
		},
	},
}
</script>
<style>
.vertical-panes {
  width: 100%;
  height: 100%;
  border: 1px solid #ccc;
}
.vertical-panes > .pane {
  text-align: left;
  padding: 2px;
  overflow: hidden;
}
.vertical-panes > .pane ~ .pane {
  border-left: 1px solid #ccc;
}
</style>
