<template>
	<Modal v-if="modal" :title="t('ollabudgetmanager', 'New Loyalty Card')" @close="closeModal">
		<div class="modal__content">
			<input
				ref="nameField"
				v-model="name"
				:placeholder="t('ollabudgetmanager', 'Card name')"
				type="text"
				required>
			<br>
			<input
				ref="storeField"
				v-model="store"
				:placeholder="t('ollabudgetmanager', 'Store name')"
				type="text"
				required>
			<br>
			<Multiselect
				v-model="format"
				:options="cardFormats"
				:multiple="false"
				track-by="id"
				:placeholder="t('ollabudgetmanager', 'Card format')"
				label="label" />
			<br>
			<input
				ref="valueField"
				v-model="value"
				:placeholder="t('ollabudgetmanager', 'Value')"
				type="text"
				required>
			<br>
			<textarea
				v-model="notes"
				rows="10"
				class="form-control"
				style="min-width: 100%"
				placeholder="Add some notes" />
			<br>
			<button class="primary"
				@click="createCard">
				<span class="icon icon-confirm-white" />
				{{ t('ollabudgetmanager', 'Add a loyalty card') }}
			</button>
			<button class="primary"
				@click="clear">
				<span class="icon icon-close-white" />
				{{ t('ollabudgetmanager', 'Clear') }}
			</button>
		</div>
	</Modal>
</template>

<script>
import Modal from '@nextcloud/vue/dist/Components/Modal'
import Multiselect from '@nextcloud/vue/dist/Components/Multiselect'

const cardFormats = [
	{ id: 1, label: 'EAN-13' },
	{ id: 2, label: 'EAN-8' },
	{ id: 3, label: 'QR Code' },
	{ id: 4, label: 'UPC-A' },
	{ id: 5, label: 'TYPE 128' },
	{ id: 6, label: 'TYPE 39' },
	{ id: 7, label: 'Other' },
]

export default {
	name: 'NewLoyaltyCard',
	components: {
		Modal,
		Multiselect,
	},
	directives: {},
	props: {
		modal: {
			type: Boolean,
			default: false,
		},
	},
	data() {
		return {
			name: '',
			notes: '',
			store: '',
			value: '',
			format: cardFormats[0],
			cardFormats,
		}
	},
	computed: {
	},
	watch: {},
	mounted() {},
	methods: {
		createCard(e) {
			const loyaltyCard = {
				name: this.name,
				store: this.store,
				notes: this.notes,
				value: this.value,
				cardFormat: this.format.label,
			}
			this.$emit('newLoyaltyCard', loyaltyCard)
		},
		cancelEdit(e) {
			this.clear()
		},
		clear() {
			this.name = ''
			this.notes = ''
			this.store = ''
			this.value = ''
			this.format = ''
		},
		closeModal() {
			this.clear()
			this.$emit('closeModal')
		},
		autoComplete(search, callback) {
			// do nothing
		},
	},
}
</script>
<style lang="scss" scoped>
.modal__content {
	width: 50vw;
	padding: 10px;
}
</style>
