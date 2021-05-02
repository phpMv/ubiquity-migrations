<?php
namespace Ubiquity\orm\migrations\database;

use Ubiquity\orm\migrations\MigrationOp;

class TableMigration extends AbstractMigrationObject {

	private bool $create;

	/**
	 *
	 * @var ColumnMigration[]
	 */
	private array $columns;

	public function __construct(string $name, bool $create = false) {
		parent::__construct($name);
		$this->create = $create;
	}

	public function generate() {
		if ($this->create) {
			$res[] = new MigrationOp('create-table', [
				'name' => $this->name
			]);
		}
		foreach ($this->columns as $column) {
			$column->setTable($this->name);
			$res[] = $column->generate();
		}
		return $res;
	}
}

