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

export async function create({ commit }, payload) {
	commit('createCardRequest')
	try {
	  const response = await LoyaltyCardService.create(payload)
	  commit('createCardSuccess', response)
	  const responseAll = await LoyaltyCardService.getCards()
	  commit('fetchLoyaltyCardsSuccess', responseAll)
	  return response
	} catch (e) {
	  if (e instanceof GenericError) {
			commit('createCardError', { errorCode: e.errorCode, errorMessage: e.message })
	  }
	  return false
	}
}

export async function deleteCard({ commit }, payload) {
	commit('deleteCardRequest')
	try {
	  const response = await LoyaltyCardService.delete(payload)
	  commit('deleteCardSuccess', response)
	  const responseAll = await LoyaltyCardService.getCards()
	  commit('fetchCardsSuccess', responseAll)
	  if (this.$router.currentRoute.path !== '/') {
			this.$router.push('/')
	  }
	  return response
	} catch (e) {
	  console.log(e)
	  if (e instanceof GenericError) {
			commit('deleteCardError', { errorCode: e.errorCode, errorMessage: e.message })
	  }
	  return false
	}
}
