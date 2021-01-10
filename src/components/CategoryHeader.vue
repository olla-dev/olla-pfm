<template>
	<div class="category-header">
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
		category: String,
	},
	computed: {
	},
}
</script>

<style scoped>
.category-header {
	position: absolute;
	left: 0;
	top: 0;
	padding: 7px 48px;
	display: flex;
	z-index: 10;
}
.category-header button {
	align-self: center;
	display: flex;
	cursor: pointer;
	margin: 0 5px;
	min-height: 30px;
}
.category-header h2 {
	display: flex;
	margin: 0 5px;
	cursor: pointer;
	opacity: 0.7;
	color: var(--color-main-text);
}
.category-header h2:hover {
	opacity: 1;
}
</style>
