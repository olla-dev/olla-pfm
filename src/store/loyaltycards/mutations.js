export function fetchLoyaltyCardsRequest(state) {
	state.loading = true
	state.fetchError = ''
	state.fetchErrorCode = 0
}

export function fetchLoyaltyCardsSuccess(state, payload) {
	state.data = payload
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

export function createCardRequest (state) {
	state.loading = true
	state.fetchError = ''
	state.fetchErrorCode = 0
  }
  
  export function createCardSuccess (state) {
	state.fetchError = ''
	state.fetchErrorCode = 0
	state.loading = false
  }
  
  export function createCardError (state, { errorCode, errorMessage }) {
	state.loading = false
	state.fetchError = errorMessage
	state.fetchErrorCode = errorCode
  }

  export function deleteCardRequest (state) {
	state.loading = true
	state.fetchError = ''
	state.fetchErrorCode = 0
  }
  
  export function deleteCardSuccess (state) {
	state.fetchError = ''
	state.fetchErrorCode = 0
	state.loading = false
  }
  
  export function deleteCardError (state, { errorCode, errorMessage }) {
	state.loading = false
	state.fetchError = errorMessage
	state.fetchErrorCode = errorCode
  }
