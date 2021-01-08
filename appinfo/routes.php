<?php

return [
	'resources' => [
		'loyaltycard' => ['url' => '/loyaltycards'],
		'loyaltycard_api' => ['url' => '/api/0.1/loyaltycards']
	],
	'routes' => [
		['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
		['name' => 'note_api#preflighted_cors', 'url' => '/api/0.1/{path}',
			'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']]
	]
];
