<?php
class AporteModel
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
	
	/*
	public function Listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM aporte limit 0, 10000");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$aport = new Aporte();
				$aport->__SET('id_aporte', $r->ID_APORTE);
				$aport->__SET('cedula', $r->CEDULA);
				$aport->__SET('anio', $r->ANIO);
				$aport->__SET('mes', $r->MES);
				$aport->__SET('sueldo', $r->SUELDO);
				$aport->__SET('subanti', $r->SUBANTI);
				$aport->__SET('a_personal', $r->APORTE_PERSONAL);
				$aport->__SET('a_patronal', $r->APORTE_PATRONAL);
				$result[] = $aport;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
	*/
	public function Listar($cedula){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM aporte where CEDULA = ".$cedula);
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$aport = new Aporte();
				$aport->__SET('id_aporte', $r->ID_APORTE);
				$aport->__SET('cedula', $r->CEDULA);
				$aport->__SET('anio', $r->ANIO);
				$aport->__SET('mes', $r->MES);
				$aport->__SET('sueldo', $r->SUELDO);
				$aport->__SET('subanti', $r->SUBANTI);
				$aport->__SET('a_personal', $r->APORTE_PERSONAL);
				$aport->__SET('a_patronal', $r->APORTE_PATRONAL);
				$result[] = $aport;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}