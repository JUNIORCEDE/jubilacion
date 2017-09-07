<?php
class CrugeAuthitemChild
{
	private $parent;
	private $child;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}