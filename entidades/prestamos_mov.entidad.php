<?php
class Prestamo_Mov
{
	/*private $iduser;
	private $regdate;
	private $actdate;
	private $logondate;
	private $username;
	private $email;
	private $password;
	private $authkey;
	private $state;
	private $totalsessioncounter;
	private $currentsessioncounter;*/
	private $codigo_movimiento;
	private $cedula;
	private $numero;
	private $monto;
	private $cuota;
	private $capital;
	private $interes;
	private $mes;
	private $anio;
	private $estado;
	private $id_prest;
	private $marca;
	private $saldo;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}