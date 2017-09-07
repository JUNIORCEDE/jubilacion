<?php
class CrugeSession
{
	private $idusession;
	private $iduser;
	private $created;
	private $expire;
	private $status;
	private $ipaddress;
	private $usagecount;
	private $lastusage;
	private $logoutdate;
	private $ipaddressout;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}