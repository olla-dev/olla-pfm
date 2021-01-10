<?php

namespace OCA\OllaBudgetManager\Tests\Unit\Service;

use OCA\OllaBudgetManager\Service\LoyaltycardNotFound;
use PHPUnit\Framework\TestCase;

use OCP\AppFramework\Db\DoesLoyaltyCardxistException;

use OCA\OllaBudgetManager\Db\Loyaltycard;
use OCA\OllaBudgetManager\Service\LoyaltycardService;
use OCA\OllaBudgetManager\Db\LoyaltycardMapper;

class LoyaltycardServiceTest extends TestCase {
	private $service;
	private $mapper;
	private $userId = 'john';

	public function setUp(): void {
		$this->mapper = $this->getMockBuilder(LoyaltycardMapper::class)
			->disableOriginalConstructor()
			->getMock();
		$this->service = new LoyaltyCardService($this->mapper);
	}

	public function testUpdate() {
		// the existing LoyaltyCard
		$LoyaltyCard = Loyaltycard::fromRow([
			'id' => 3,
			'title' => 'yo',
			'content' => 'nope'
		]);
		$this->mapper->expects($this->once())
			->method('find')
			->with($this->equalTo(3))
			->will($this->returnValue($LoyaltyCard));

		// the LoyaltyCard when updated
		$updatedLoyaltyCard = Loyaltycard::fromRow(['id' => 3]);
		$updatedLoyaltyCard->setTitle('title');
		$updatedLoyaltyCard->setContent('content');
		$this->mapper->expects($this->once())
			->method('update')
			->with($this->equalTo($updatedLoyaltyCard))
			->will($this->returnValue($updatedLoyaltyCard));

		$result = $this->service->update(3, 'title', 'content', $this->userId);

		$this->assertEquals($updatedLoyaltyCard, $result);
	}

	public function testUpdateNotFound() {
		$this->expectException(LoyaltycardNotFound::class);
		// test the correct status code if no LoyaltyCard is found
		$this->mapper->expects($this->once())
			->method('find')
			->with($this->equalTo(3))
			->will($this->throwException(new DoesLoyaltycardxistException('')));

		$this->service->update(3, 'title', 'content', $this->userId);
	}
}
