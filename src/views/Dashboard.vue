<template>
	<div class="dashboard-heading">
		<h1>
			{{ t('ollabudgetmanager', 'Dashboard') }}
		</h1>
	</div>
</template>
<script>
</script>
<style lang="scss" scoped>
.dashboard-heading {
    position: absolute;
    left: 0;
    top: 0;
    padding: 7px 48px;
    display: flex;
    z-index: 10;
}

.dashboard-heading h1 {
    align-self: center;
    display: flex;
    cursor: pointer;
    margin: 0 5px;
    min-height: 30px;
}

.dashboard-heading h1 {
    display: flex;
    margin: 0 5px;
    cursor: pointer;
    opacity: 0.7;
    color: var(--color-main-text);
}

.dashboard-heading h1:hover {
    opacity: 1;
}
</style>
