<template>
	<div id="app-content-wrapper">
		<CategoryHeader category="loyaltycards" />
		<br>
		<br>
		<AppContentList :class="{loading: false}">
			<div class="loyaltycards-heading">
				<button class="primary"
					@click="showCreateCardModal">
					<span class="icon icon-add-white" />
					{{ t('ollabudgetmanager', 'Add a loyalty card') }}
				</button>
			</div>
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
			<NewLoyaltyCard
				:modal="modal"
				@newLoyaltyCard="newLoyaltyCard"
				@closeModal="closeModal" />
		</AppContentList>
		<AppContentDetails>
			TODO LoyaltyCards CONTENT
		</AppContentDetails>
	</div>
</template>

<script>
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
	},
}
</script>

<style lang="scss" scoped>
.loyaltycards-heading {
    position: absolute;
    left: 0;
    top: 0;
    padding: 7px 48px;
    display: flex;
    z-index: 10;
}

.loyaltycards-heading button {
    align-self: center;
    display: flex;
    cursor: pointer;
    margin: 0 5px;
    min-height: 30px;
}

.loyaltycards-heading h2 {
    display: flex;
    margin: 0 5px;
    cursor: pointer;
    opacity: 0.7;
    color: var(--color-main-text);
}

.loyaltycards-heading h2:hover {
    opacity: 1;
}

.app-content-list .app-content-list-item .app-content-list-item-icon {
    border-radius: 3px 12px 3px 3px;
    line-height: 40px;
    width: 30px;
    left: 12px;
}

.app-content-list .app-content-list-item .app-content-list-item-details.active {
    opacity: 1;
}

.app-content-list div.app-content-list-item:hover {
    background-color: var(--color-main-background);
}

.app-content-list div.app-content-list-item {
    cursor: default;
}
</style>
