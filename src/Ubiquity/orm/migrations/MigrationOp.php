<?php
namespace Ubiquity\orm\migrations;

class MigrationOp {

	private string $name;

	private array $params;

	public function __construct($name, $params) {
		$this->name = $name;
		$this->params = $params;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 *
	 * @return mixed
	 */
	public function getParams() {
		return $this->params;
	}

	/**
	 *
	 * @param mixed $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 *
	 * @param mixed $params
	 */
	public function setParams($params) {
		$this->params = $params;
	}
}

