import GenericError from './errors/generic'
import { generateUrl } from '@nextcloud/router'
import axios from '@nextcloud/axios'

const api_url = generateUrl('/apps/ollabudgetmanager/loyaltycards')

const LoyaltyCardService = {
	
	/**
   * List producers.
   **/
	async getCards() {
		try {
			const response = await axios.get(api_url)
			const cards = response.data
			// console.log(cards)
			return cards
		} catch (error) {
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	},
	create: async function (payload) {
		try {
			console.log(payload)
			const response = await axios.post(api_url, payload)
			return response.data
		} catch (error) {
			console.log(error)
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	},
	delete: async function (payload) {
		try {
			
		} catch (error) {
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	}
}

export default LoyaltyCardService

export { LoyaltyCardService, GenericError }
