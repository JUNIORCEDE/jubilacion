<?php
class Aporte
{
	private $ID_APORTE;
	private $CEDULA;
	private $ANIO;
	private $MES;
	private $SUELDO;
	private $SUBANTI;
	private $APORTE_PERSONAL;
	private $APORTE_PATRONAL;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}