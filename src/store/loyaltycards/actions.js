import { showError } from '@nextcloud/dialogs'
import { LoyaltyCardService, GenericError } from '../../api/loyaltycards.service'

export async function fetchLoyaltyCards({ commit }) {
	commit('fetchLoyaltyCardsRequest')
	try {
		const response = await LoyaltyCardService.getCards()
		commit('fetchLoyaltyCardsSuccess', response)
		return true
	} catch (e) {
		if (e instanceof GenericError) {
			showError(t('ollabudgetmanager', 'Could not fetch loyalty cards :/'))
			commit('fetchLoyaltyCardsError', { errorCode: e.errorCode, errorMessage: e.message })
		}
		return false
	}
}
