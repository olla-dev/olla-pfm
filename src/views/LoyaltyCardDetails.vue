<template>
	<div v-if="selectedLoyaltyCard">
		<ListItemIcon :title="selectedLoyaltyCard.name" :subtitle="selectedLoyaltyCard.store" icon="icon-delete" :is-no-user="true" />
		<VueBarcode :value="selectedLoyaltyCard.value">
			Show this if the rendering fails.
		</VueBarcode>
	</div>
</template>
<script>
import ListItemIcon from '@nextcloud/vue/dist/Components/ListItemIcon'
import VueBarcode from 'vue-barcode'

export default {
	name: 'LoyaltyCardDetails',
	components: {
		ListItemIcon,
		VueBarcode
	},
	data() {
		return {
			loading: false,
			cardId: null
		}
	},
	computed: {
		selectedLoyaltyCard: function () {
        	return this.$store.getters['loyaltycards/getById'](this.$route.params.id);
    	}
	},
	mounted() {
		this.$forceUpdate();
	},
	methods: {
	},
}
</script>
