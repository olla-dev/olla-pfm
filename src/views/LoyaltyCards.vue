<template>
	<div id="app-content-wrapper">
		<CategoryHeader category="loyaltycards" />
		<br/>
		<br/>
		<AppContentList :class="{loading: false}">
			<div class="loyaltycards-heading">
				<button class="primary"
				@click="showCreateCardModal">
					<span class="icon icon-add-white" />
					{{ t('ollabudgetmanager', 'Add a loyalty card') }}
				</button>
			</div>
			<!--<router-link v-for="page in pages"
				:key="page.title"
				:to="`/${collectiveParam}/${encodeURIComponent(page.title)}`"
				:class="{active: isActive(page)}"
				class="app-content-list-item">
				<div class="app-content-list-item-icon"
					:style="iconStyle(`Page-${page.id}`)">
					{{ firstGrapheme(page.title) }}
				</div>
				<div class="app-content-list-item-line-one">
					{{ page.title }}
				</div>
				<div class="app-content-list-item-line-two">
					{{ lastUpdate(page) }}
				</div>
				<span class="app-content-list-item-details"
					:class="{active: recentlyEdited(page)}">
					<Avatar v-if="page.lastUserId"
						:user="page.lastUserId"
						:disable-menu="true"
						:tooltip-message="lastEditedUserMessage(page)"
						:size="20" />
				</span>
			</router-link>-->
			<NewLoyaltyCard 
				:modal="modal"
				@newLoyaltyCard="newLoyaltyCard"
				@closeModal="closeModal"/>
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
		NewLoyaltyCard
		// Avatar,
	},
	data() {
		return {
			loading: false,
			modal: false
		}
	},
	computed: {
		loyaltycards() {
			return this.$store.getters.loyaltycards
		},
		selectedLoyaltyCard() {
			return this.$store.getters.selectedLoyaltyCard
		},
	},

	methods: {
		showCreateCardModal() {
			this.modal = true
		},
		/**
		 * Create a new page and focus the page  automatically
		 */
		async newLoyaltyCard() {
			try {
				debugger
				await this.$store.dispatch('loyaltycards/loyaltycards/createCard', {
					store: "a",
					notes: "a",
					text: "a",
					format: "aaa"
				})
				this.closeModal()
			} catch (e) {
				console.error(e)
				showError(t('ollabudgetmanager', 'Could not create the loyalty card'))
			}
		},
        closeModal() {
			this.modal = false
		}
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
