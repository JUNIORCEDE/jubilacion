<?php
class CrugeAuthitem
{
	private $name;
	private $type;
	private $description;
	private $bizrule;
	private $data;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}