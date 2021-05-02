<?php
namespace Ubiquity\orm\migrations;

use Ubiquity\orm\migrations\database\DatabaseMigration;
use Ubiquity\orm\migrations\database\TableMigration;
use Ubiquity\orm\migrations\database\ColumnMigration;

class DatabaseMigrationOperations extends AbstractMigrationOperations {

	/**
	 *
	 * @var MigrationOp[]
	 */
	private $migrations;

	public function createDatabase(string $name, bool $addToMigrations = false): DatabaseMigration {
		$dbM = new DatabaseMigration($name);
		if ($addToMigrations) {
			$this->migrations[] = $dbM;
		}
		return $dbM;
	}

	public function createTable(string $name, bool $addToMigrations = false): TableMigration {
		$dbT = new TableMigration($name, true);
		if ($addToMigrations) {
			$this->migrations[] = $dbT;
		}
		return $dbT;
	}

	public function addColumn($table, $name, $type, $size = null, $nullable = true, $default = null, bool $addToMigrations = false): ColumnMigration {
		$column = new ColumnMigration($name, $type, $size, $nullable, $default);
		$column->setTable($table);
		if ($addToMigrations) {
			$this->migrations[] = $column;
		}
		return $column;
	}

	public function getMigrationOps() {
		$ops = [];
		foreach ($this->migrations as $migration) {
			$ops += $migration->generate();
		}
		return $ops;
	}
}

