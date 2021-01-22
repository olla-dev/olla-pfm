export const getById = (state) => (cardId) => {
	return state.data.find(card => card.id === parseInt(cardId))
}
