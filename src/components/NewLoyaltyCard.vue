<template>
	<Modal v-if="modal" @close="closeModal" :title="t('ollabudgetmanager', 'New Loyalty Card')">
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
            <input
                ref="valueField"
                v-model="value"
                :placeholder="t('ollabudgetmanager', 'Value')"
                type="text"
                required>
            <br>
            <textarea 
                rows="10"
                v-model="notes"
                class="form-control" 
                style="min-width: 100%" 
                placeholder="Add some notes"
                />
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
import { ActionButton, Actions, AppNavigationItem } from '@nextcloud/vue'

export default {
	name: 'NewLoyaltyCard',
	components: {
		AppNavigationItem,
		ActionButton,
		Actions,
        Modal,
	},
	directives: {},
	props: {
        modal: false
    },
	data() {
		return {
            name: "",
            notes: "",
            store: "",
            value: ""
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
				value: this.value
			}
            this.$emit('newLoyaltyCard', loyaltyCard)
		},
		cancelEdit(e) {
			this.clear()
		},
		clear() {
			this.name = ""
			this.notes = ""
			this.store = ""
			this.value = ""
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
    margin: 5vw 0;
    padding: 10px;
}
</style>