<template>
	<div id="app-content-wrapper">
		<CategoryHeader category="about" />
		<EmptyContent icon="icon-info">
			{{ t('ollabudgetmanager', 'Olla Budget Manager v0.0.1') }}
		</EmptyContent>
	</div>
</template>
<script>
import CategoryHeader from '../components/CategoryHeader'
import EmptyContent from '@nextcloud/vue/dist/Components/EmptyContent'
export default {
	name: 'About',
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
<style lang="scss" scoped>
.about-heading {
    position: absolute;
    left: 0;
    top: 0;
    padding: 7px 48px;
    display: flex;
    z-index: 10;
}

.about-heading h1 {
    align-self: center;
    display: flex;
    cursor: pointer;
    margin: 0 5px;
    min-height: 30px;
}

.about-heading h1 {
    display: flex;
    margin: 0 5px;
    cursor: pointer;
    opacity: 0.7;
    color: var(--color-main-text);
}

.about-heading h1:hover {
    opacity: 1;
}
</style>
