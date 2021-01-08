<template>
	<AppContentList :class="{loading: false}">
		<div class="app-content-list-item">
			<button class="primary">
				<span class="icon icon-add-white" />
				{{ t('ollabudgetmanager', 'Add a loyalty card') }}
			</button>
		</div>
        <router-link v-for="page in pages"
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
		</router-link>
	</AppContentList>
</template>

<script>
import AppContentList from '@nextcloud/vue/dist/Components/AppContentList'
import Avatar from '@nextcloud/vue/dist/Components/Avatar'
import moment from '@nextcloud/moment'

import '@nextcloud/dialogs/styles/toast.scss'

export default {
	name: 'LoyaltyCards',
	components: {
		AppContentList,
		Avatar
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
