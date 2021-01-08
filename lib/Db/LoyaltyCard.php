<?php

namespace OCA\OllaBudgetManager\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class LoyaltyCard extends Entity implements JsonSerializable {
	protected $title;
	protected $content;
	protected $format;
	protected $notes;
	protected $userId;

	public function jsonSerialize(): array {
		return [
			'id' => $this->id,
			'title' => $this->title,
			'content' => $this->content,
			'format' => $this->format,
			'notes' => $this->notes
		];
	}
}
