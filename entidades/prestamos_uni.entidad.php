<?php
class Prestamo_Uni
{
	private $CODIGO;
	private $MES;
	private $NOMBRE;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}