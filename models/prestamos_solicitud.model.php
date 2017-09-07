<?php
class Prestamo_SoliModel
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
			$stm = $this->pdo->prepare("SELECT * FROM prestamos_solicitud");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$prest = new Prestamo_Soli();
				$prest->__SET('codigo', $r->codigo);
				$prest->__SET('num_soli', $r->num_soli);
				$prest->__SET('cedula', $r->cedula);
				$prest->__SET('nombres', $r->nombres);
				$prest->__SET('monto', $r->monto);
				$prest->__SET('periodos', $r->periodos);
				$prest->__SET('estado', $r->estado);
				$prest->__SET('tipo', $r->tipo);
				$prest->__SET('procesado', $r->procesado);
				$prest->__SET('fecha', $r->fecha);
				$result[] = $prest;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}