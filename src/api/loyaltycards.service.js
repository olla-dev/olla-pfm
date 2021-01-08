import GenericError from './errors/generic'
import { generateUrl } from '@nextcloud/router'
import axios from '@nextcloud/axios'

const LoyaltyCardService = {
	/**
   * List producers.
   **/
	async getCards() {
		try {
			const response = await axios.get(generateUrl('/apps/ollabudgetmanager/loyaltycards'))
			const cards = response.data
			// console.log(cards)
			return cards
		} catch (error) {
			throw new GenericError(error.response.status, error.response.data.detail)
		}
	},
}

export default LoyaltyCardService

export { LoyaltyCardService, GenericError }
