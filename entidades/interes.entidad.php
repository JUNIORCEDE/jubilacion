<?php
class Interes
{
	private $ID_INTERES;
	private $ANIO;
	private $CEDULA;
	private $CAPITAL;
	private $CAPTOTA;
	private $INTERES;
	private $MONTO;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}