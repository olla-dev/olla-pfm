<?php

namespace OCA\OllaBudgetManager\Tests\Integration\Controller;

use OCP\AppFramework\App;
use OCP\IRequest;
use PHPUnit\Framework\TestCase;


use OCA\OllaBudgetManager\Db\LoyaltyCard;
use OCA\OllaBudgetManager\Db\LoyaltyCardMapper;
use OCA\OllaBudgetManager\Controller\LoyaltyCardController;

class LoyaltyCardIntegrationTest extends TestCase {
	private $controller;
	private $mapper;
	private $userId = 'john';

	public function setUp(): void {
		$app = new App('ollabudgetmanager');
		$container = $app->getContainer();

		// only replace the user id
		$container->registerService('userId', function () {
			return $this->userId;
		});

		// we do not care about the request but the controller needs it
		$container->registerService(IRequest::class, function () {
			return $this->createMock(IRequest::class);
		});

		$this->controller = $container->query(LoyaltyCardController::class);
		$this->mapper = $container->query(LoyaltyCardMapper::class);
	}

	public function testUpdate() {
		// create a new LoyaltyCard that should be updated
		$LoyaltyCard = new LoyaltyCard();
		$LoyaltyCard->setTitle('old_title');
		$LoyaltyCard->setContent('old_content');
		$LoyaltyCard->setUserId($this->userId);

		$id = $this->mapper->insert($LoyaltyCard)->getId();

		// fromRow does not set the fields as updated
		$updatedLoyaltyCard = LoyaltyCard::fromRow([
			'id' => $id,
			'user_id' => $this->userId
		]);
		$updatedLoyaltyCard->setContent('content');
		$updatedLoyaltyCard->setTitle('title');

		$result = $this->controller->update($id, 'title', 'content');

		$this->assertEquals($updatedLoyaltyCard, $result->getData());

		// clean up
		$this->mapper->delete($result->getData());
	}
}
