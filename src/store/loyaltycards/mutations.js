export function fetchLoyaltyCardsRequest(state) {
	state.loading = true
	state.fetchError = ''
	state.fetchErrorCode = 0
}

export function fetchLoyaltyCardsSuccess(state, payload) {
	state.loyaltyCards = payload
	state.selectedLoyaltyCard = {}
	state.fetchError = ''
	state.fetchErrorCode = 0
	state.loading = false
}

export function fetchLoyaltyCardSuccess(state, payload) {
	state.selectedLoyaltyCard = payload
	state.fetchError = ''
	state.fetchErrorCode = 0
	state.loading = false
}

export function fetchLoyaltyCardsError(state, { errorCode, errorMessage }) {
	state.loading = false
	state.fetchError = errorMessage
	state.fetchErrorCode = errorCode
}
