<?php
class CrugeSystem
{
	private $idsystem;
	private $name;
	private $largename;
	private $sessionmaxdurationmins;
	private $sessionmaxsameipconnections;
	private $sessionreusesessions;
	private $sessionmaxsessionsperday;
	private $sessionmaxsessionsperuser;
	private $systemnonewsessions;
	private $systemdown;
	private $registerusingcaptcha;
	private $registerusingterms;
	private $terms;
	private $registerusingactivation;
	private $defaultroleforregistration;
	private $registerusingtermslabel;
	private $registrationonlogin;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}