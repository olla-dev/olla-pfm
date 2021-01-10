<?php

namespace OCA\OllaBudgetManager\Tests\Unit\Controller;

use OCA\OllaBudgetManager\Controller\LoyaltycardApiController;

class LoyaltycardApiControllerTest extends LoyaltycardControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new LoyaltycardApiController($this->request, $this->service, $this->userId);
	}
}
