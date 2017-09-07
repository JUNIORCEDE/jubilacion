<?php
class InteresModel
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
			$stm = $this->pdo->prepare("SELECT * FROM interes limit 0,10000");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$inte = new Interes();
				$inte->__SET('id_interes', $r->ID_INTERES);
				$inte->__SET('anio', $r->ANIO);
				$inte->__SET('cedula', $r->CEDULA);
				$inte->__SET('capital', $r->CAPITAL);
				$inte->__SET('captota', $r->CAPTOTA);
				$inte->__SET('interes', $r->INTERES);
				$inte->__SET('monto', $r->MONTO);
				$result[] = $inte;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}