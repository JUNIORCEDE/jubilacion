<?php
class Prestamo
{
	private $codigo;
	private $id_prest;
	private $cedula;
	private $ini_mes;
	private $ini_anio;
	private $fin_mes;
	private $fin_anio;
	private $monto;
	private $saldo;
	private $estado;
	private $periodos;
	private $cuota;
	private $observa;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}