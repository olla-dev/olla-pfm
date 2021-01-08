<?php

namespace OCA\OllaBudgetManager\Tests\Unit\Controller;

use PHPUnit\Framework\TestCase;

use OCP\AppFramework\Http;
use OCP\IRequest;

use OCA\OllaBudgetManager\Service\LoyaltyCardNotFound;
use OCA\OllaBudgetManager\Service\LoyaltyCardService;
use OCA\OllaBudgetManager\Controller\LoyaltyCardController;

class LoyaltyCardControllerTest extends TestCase {
	protected $controller;
	protected $service;
	protected $userId = 'john';
	protected $request;

	public function setUp(): void {
		$this->request = $this->getMockBuilder(IRequest::class)->getMock();
		$this->service = $this->getMockBuilder(LoyaltyCardService::class)
			->disableOriginalConstructor()
			->getMock();
		$this->controller = new LoyaltyCardController($this->request, $this->service, $this->userId);
	}

	public function testUpdate() {
		$LoyaltyCard = 'just check if this value is returned correctly';
		$this->service->expects($this->once())
			->method('update')
			->with($this->equalTo(3),
					$this->equalTo('title'),
					$this->equalTo('content'),
				   $this->equalTo($this->userId))
			->will($this->returnValue($LoyaltyCard));

		$result = $this->controller->update(3, 'title', 'content');

		$this->assertEquals($LoyaltyCard, $result->getData());
	}


	public function testUpdateNotFound() {
		// test the correct status code if no LoyaltyCard is found
		$this->service->expects($this->once())
			->method('update')
			->will($this->throwException(new LoyaltyCardNotFound()));

		$result = $this->controller->update(3, 'title', 'content');

		$this->assertEquals(Http::STATUS_NOT_FOUND, $result->getStatus());
	}
}
