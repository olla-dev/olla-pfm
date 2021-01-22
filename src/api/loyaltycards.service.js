import GenericError from './errors/generic'
import { generateUrl } from '@nextcloud/router'
import axios from '@nextcloud/axios'

const apiUrl = generateUrl('/apps/ollabudgetmanager/loyaltycards')

const LoyaltyCardService = {

	/**
   * List producers.
   **/
	async getCards() {
		try {
			const response = await axios.get(apiUrl)
			const cards = response.data
			// console.log(cards)
			return cards
		} catch (error) {
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	},
	async create(payload) {
		try {
			const response = await axios.post(apiUrl, payload)
			return response.data
		} catch (error) {
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	},
	async delete(payload) {
		try {
			// todo
		} catch (error) {
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	},
}

export default LoyaltyCardService

export { LoyaltyCardService, GenericError }
