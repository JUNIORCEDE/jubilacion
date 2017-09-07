<?php
class EmpleadoModel
{
	private $pdo;

	public function __CONSTRUCT(){
		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=fblearnc_jubilacion', 'fblearnc_admin', 'Proyecto1234');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		       
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM empleado");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$emp = new Empleado();
				$emp->__SET('cedula', $r->CEDULA);
				$emp->__SET('tipo', $r->TIPO);
				$emp->__SET('nombres', $r->NOMBRES);
				$emp->__SET('f_ingreso', $r->FECHA_INGRESO);
				$emp->__SET('estado', $r->ESTADO);
				$result[] = $emp;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}