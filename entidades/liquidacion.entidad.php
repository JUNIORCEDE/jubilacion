<?php
class Liquidacion
{
	private $codigo;
	private $nombres;
	private $cedula;
	private $titulo;
	private $fecha;
	private $cantidad;
	private $detalle;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}