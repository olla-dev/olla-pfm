<template>
	<Content app-name="ollabudgetmanager">
		<AppNavigation>
			<ul>
				<AppNavigationCaption :title="t('ollabudgetmanager', 'Select a category')" />

				<AppNavigationItem
					:title="t('ollabudgetmanager', 'Dashboard')"
					to="/"
					icon="icon-home" />
				<AppNavigationItem
					icon="icon-tag"
					to="loyaltycards"
					:title="t('ollabudgetmanager', 'Loyalty Cards')" />
			</ul>
			<!-- settings -->
			<template #footer>
				<AppNavigationSettings v-if="!loading">
					<AppNavigationItem
						icon="icon-info"
						to="about"
						:title="t('ollabudgetmanager', 'About')" />
				</AppNavigationSettings>
			</template>
		</AppNavigation>
		<AppContent>
			<EmptyContent v-if="loading" icon="icon-loading">
				{{ t('ollabudgetmanager', 'Loading …') }}
			</EmptyContent>
			<router-view v-else />
		</AppContent>
	</Content>
</template>

<script>
import AppContent from '@nextcloud/vue/dist/Components/AppContent'
import AppNavigation from '@nextcloud/vue/dist/Components/AppNavigation'
import AppNavigationItem from '@nextcloud/vue/dist/Components/AppNavigationItem'
import AppNavigationCaption from '@nextcloud/vue/dist/Components/AppNavigationCaption'
import AppNavigationSettings from '@nextcloud/vue/dist/Components/AppNavigationSettings'
import Content from '@nextcloud/vue/dist/Components/Content'
import EmptyContent from '@nextcloud/vue/dist/Components/EmptyContent'

import '@nextcloud/dialogs/styles/toast.scss'

export default {
	name: 'App',
	components: {
		AppContent,
		AppNavigation,
		AppNavigationItem,
		AppNavigationCaption,
		AppNavigationSettings,
		Content,
		EmptyContent,
	},
	data() {
		return {
			loading: false,
		}
	},
	computed: {
	},
	methods: {
	},
}
</script>
<style scoped>
	#app-content > div {
		width: 100%;
		height: 100%;
		padding: 20px;
		display: flex;
		flex-direction: column;
		flex-grow: 1;
	}

	input[type='text'] {
		width: 100%;
	}

	textarea {
		flex-grow: 1;
		width: 100%;
	}
</style>
