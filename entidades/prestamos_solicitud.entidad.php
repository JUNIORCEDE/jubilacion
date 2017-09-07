<?php
class Prestamo_Soli
{
	private $codigo;
	private $num_soli;
	private $cedula;
	private $nombres;
	private $monto;
	private $periodos;
	private $estado;
	private $tipo;
	private $procesado;
	private $fecha;
	private $detalle;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}