<template>
	<div id="app-content-wrapper">
		<AppContentList :class="{loading: false}">
			<div class="loyaltycards-heading">
				<h2>
					{{ t('ollabudgetmanager', 'Loyalty Cards') }}
				</h2>
			</div>
			<div class="loyaltycards-heading">
				<button class="primary">
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
		</AppContentList>
		<AppContentDetails>
			TODO LoyaltyCards CONTENT
		</AppContentDetails>
	</div>
</template>

<script>
import AppContentList from '@nextcloud/vue/dist/Components/AppContentList'
import AppContentDetails from '@nextcloud/vue/dist/Components/AppContentDetails'
// import Avatar from '@nextcloud/vue/dist/Components/Avatar'

import '@nextcloud/dialogs/styles/toast.scss'

export default {
	name: 'LoyaltyCards',
	components: {
		AppContentList,
		AppContentDetails,
		// Avatar,
	},
	data() {
		return {
			loading: false,
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
