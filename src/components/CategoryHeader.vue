<template>
	<div class="category-header app-content-list-item">
		<h2>
			<router-link :to="`/${category}`">
				{{ category }}
			</router-link>
		</h2>
	</div>
</template>

<script>
export default {
	name: 'CategoryHeader',
	props: {
		category: {
			type: String,
			default: '',
		},
	},
	computed: {
	},
}
</script>

<style scoped>
.category-header {
	left: 0;
	top: 0;
	padding-left: 48px;
	padding-top: 7px;
	padding-bottom: 7px;
	display: flex;
}

.category-header button {
	align-self: center;
	display: flex;
	cursor: pointer;
	min-height: 40px;
}
</style>
