<?php

namespace OCA\OllaBudgetManager\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Loyaltycard extends Entity implements JsonSerializable {
	protected $name;
	protected $notes;
	protected $store;
	protected $value;
	protected $format;
	protected $userId;

	public function jsonSerialize(): array {
		return [
			'id' => $this->id,
			'name' => $this->name,
			'notes' => $this->notes,
			'store' => $this->store,
			'value' => $this->value,
			'format' => $this->format
		];
	}
}
