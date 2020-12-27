<?php

namespace OCA\OllaBudgetManager\Tests\Unit\Controller;

use OCA\OllaBudgetManager\Controller\NoteApiController;

class NoteApiControllerTest extends NoteControllerTest {
	public function setUp(): void {
		parent::setUp();
		$this->controller = new NoteApiController($this->request, $this->service, $this->userId);
	}
}
