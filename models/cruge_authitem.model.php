<?php
class CrugeAuthitemModel
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
			$stm = $this->pdo->prepare("SELECT * FROM cruge_authitem");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cruge = new CrugeAuthitem();
				$cruge->__SET('name', $r->name);
				$cruge->__SET('type', $r->type);
				$cruge->__SET('description', $r->description);
				$cruge->__SET('bizrule', $r->bizrule);
				$cruge->__SET('data', $r->data);
				
				$result[] = $cruge;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}