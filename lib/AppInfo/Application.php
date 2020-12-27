<?php

namespace OCA\OllaBudgetManager\AppInfo;

use OCP\AppFramework\App;

class Application extends App {
	public const APP_ID = 'ollabudgetmanager';

	public function __construct() {
		parent::__construct(self::APP_ID);
	}
}
