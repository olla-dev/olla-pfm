<?php

namespace OCA\OllaBudgetManager\Service;

use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\OllaBudgetManager\Db\Loyaltycard;
use OCA\OllaBudgetManager\Db\LoyaltycardMapper;

class LoyaltycardService {

	/** @var LoyaltycardMapper */
	private $mapper;

	public function __construct(LoyaltycardMapper $mapper) {
		$this->mapper = $mapper;
	}

	public function findAll(string $userId): array {
		return $this->mapper->findAll($userId);
	}

	private function handleException(Exception $e): void {
		if ($e instanceof DoesNotExistException ||
			$e instanceof MultipleObjectsReturnedException) {
			throw new LoyaltycardNotFound($e->getMessage());
		} else {
			throw $e;
		}
	}

	public function find($id, $userId) {
		try {
			return $this->mapper->find($id, $userId);

		// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function create(
		$name, 
		$notes,
		$store,
		$value,
		$format,
		$userId) {
		$loyaltyCard = new Loyaltycard();
		$loyaltyCard->setName($name);
		$loyaltyCard->setNotes($notes);
		$loyaltyCard->setStore($store);
		$loyaltyCard->setValue($value);
		$loyaltyCard->setFormat($format);
		$loyaltyCard->setUserId($userId);
		return $this->mapper->insert($loyaltyCard);
	}

	public function update($id, $title, $content, $userId) {
		try {
			$loyaltyCard = $this->mapper->find($id, $userId);
			$loyaltyCard->setName($name);
			$loyaltyCard->setNotes($notes);
			$loyaltyCard->setStore($store);
			$loyaltyCard->setValue($value);
			$loyaltyCard->setFormat(strval($format));
			$loyaltyCard->setUserId($userId);
			return $this->mapper->update($note);
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}

	public function delete($id, $userId) {
		try {
			$loyaltyCard = $this->mapper->find($id, $userId);
			$this->mapper->delete($note);
			return $loyaltyCard;
		} catch (Exception $e) {
			$this->handleException($e);
		}
	}
}
