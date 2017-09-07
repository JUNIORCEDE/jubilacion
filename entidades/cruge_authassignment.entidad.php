<?php
class CrugeAuthassignment
{
	private $userid;
	private $bizrule;
	private $data;
	private $itemname;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}