<?php
namespace Ubiquity\orm\migrations\database;

use Ubiquity\orm\migrations\MigrationOp;

class ColumnMigration extends AbstractMigrationObject {

	private string $table;

	private string $type;

	private ?int $size;

	private bool $nullable;

	private mixed $default;

	public function __construct(string $name, string $type, ?int $size = null, bool $nullable = true, mixed $default = null) {
		parent::__construct($name);
		$this->type = $type;
		$this->size = $size;
		$this->nullable = $nullable;
		$this->default = $default;
	}

	public function generate() {
		return new MigrationOp('add-column', [
			'table' => $this->table,
			'name' => $this->name,
			'type' => $this->type,
			'size' => $this->size,
			'nullable' => $this->nullable,
			'default' => $this->default
		]);
	}

	/**
	 *
	 * @return mixed
	 */
	public function getTable() {
		return $this->table;
	}

	/**
	 *
	 * @return \Ubiquity\orm\migrations\database\string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 *
	 * @return \Ubiquity\orm\migrations\database\int
	 */
	public function getSize() {
		return $this->size;
	}

	/**
	 *
	 * @return \Ubiquity\orm\migrations\database\bool
	 */
	public function getNullable() {
		return $this->nullable;
	}

	/**
	 *
	 * @return \Ubiquity\orm\migrations\database\mixed
	 */
	public function getDefault() {
		return $this->default;
	}

	/**
	 *
	 * @param mixed $table
	 */
	public function setTable($table) {
		$this->table = $table;
	}

	/**
	 *
	 * @param \Ubiquity\orm\migrations\database\string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 *
	 * @param \Ubiquity\orm\migrations\database\int $size
	 */
	public function setSize($size) {
		$this->size = $size;
	}

	/**
	 *
	 * @param \Ubiquity\orm\migrations\database\bool $nullable
	 */
	public function setNullable($nullable) {
		$this->nullable = $nullable;
	}

	/**
	 *
	 * @param \Ubiquity\orm\migrations\database\mixed $default
	 */
	public function setDefault($default) {
		$this->default = $default;
	}
}

