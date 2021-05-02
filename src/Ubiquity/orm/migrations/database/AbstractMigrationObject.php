<?php
namespace Ubiquity\orm\migrations\database;

use Ubiquity\orm\migrations\MigrationOp;

abstract class AbstractMigrationObject {

	protected $name;

	public function __construct(?string $name = null) {
		$this->name = $name;
	}

	/**
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 *
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	public abstract function generate();
}

