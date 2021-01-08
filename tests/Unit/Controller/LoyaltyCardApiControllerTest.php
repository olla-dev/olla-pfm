<?php

namespace OCA\OllaBudgetManager\Tests\Unit\Controller;

use OCA\OllaBudgetManager\Controller\LoyaltyCardApiController;

class LoyaltyCardApiControllerTest extends LoyaltyCardControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new LoyaltyCardApiController($this->request, $this->service, $this->userId);
	}
}
