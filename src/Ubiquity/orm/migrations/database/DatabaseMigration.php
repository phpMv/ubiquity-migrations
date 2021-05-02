<?php
namespace Ubiquity\orm\migrations\database;

use Ubiquity\orm\migrations\MigrationOp;

class DatabaseMigration extends AbstractMigrationObject {

	/**
	 *
	 * @var TableMigration[]
	 */
	private array $tables;

	public function generate() {
		if ($this->name != null) {
			$res[] = new MigrationOp('create-database', [
				'name' => $this->name
			]);
		}
		foreach ($this->tables as $table) {
			$res[] = $table->generate();
		}
		return $res;
	}

	public function createTable(string $name): TableMigration {
		return $this->tables[$name] = new TableMigration($name, true);
	}

	public function selectTable(string $name): TableMigration {
		return $this->tables[$name] = new TableMigration($name, false);
	}
}

