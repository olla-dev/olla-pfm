<template>
	<div id="app-content-wrapper">
		<CategoryHeader category="dashboard" />
		<EmptyContent icon="icon-info">
			{{ t('ollabudgetmanager', 'Dashboard') }}
		</EmptyContent>
	</div>
</template>
<script>
import CategoryHeader from '../components/CategoryHeader'
import EmptyContent from '@nextcloud/vue/dist/Components/EmptyContent'

export default {
	name: 'Dashboard',
	components: {
		EmptyContent,
		CategoryHeader,
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
