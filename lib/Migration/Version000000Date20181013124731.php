<?php

declare(strict_types=1);

namespace OCA\OllaBudgetManager\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version000000Date20181013124731 extends SimpleMigrationStep {

	/**
	 * @param IOutput $output
	 * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
	 * @param array $options
	 * @return null|ISchemaWrapper
	 */
	public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
		/** @var ISchemaWrapper $schema */
		$schema = $schemaClosure();

		if (!$schema->hasTable('olla_loyalty_cards')) {
			$table = $schema->createTable('olla_loyalty_cards');
			$table->addColumn('id', 'integer', [
				'autoincrement' => true,
				'notnull' => true,
			]);
			$table->addColumn('name', 'string', [
				'notnull' => true,
				'length' => 200
			]);
			$table->addColumn('user_id', 'string', [
				'notnull' => true,
				'length' => 200,
			]);
			$table->addColumn('notes', 'text', [
				'notnull' => true,
				'default' => ''
			]);
			$table->addColumn('store', 'text', [
				'notnull' => false,
				'default' => ''
			]);
			$table->addColumn('value', 'text', [
				'notnull' => false,
				'default' => ''
			]);
			$table->addColumn('format', 'text', [
				'notnull' => false,
				'default' => ''
			]);

			$table->setPrimaryKey(['id']);
			$table->addIndex(['user_id'], 'olla_uid_index');
		}
		return $schema;
	}
}
