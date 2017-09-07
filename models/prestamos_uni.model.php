<?php
class Prestamo_UniModel
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
			$stm = $this->pdo->prepare("SELECT * FROM prestamos_uni");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$prest = new Prestamo_Uni();
				$prest->__SET('codigo', $r->CODIGO);
				$prest->__SET('mes', $r->MES);
				$prest->__SET('nombre', $r->NOMBRE);
				$result[] = $prest;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}