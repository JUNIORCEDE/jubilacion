<?php
class CrugeAuthassignmentModel
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
			$stm = $this->pdo->prepare("SELECT * FROM cruge_authassignment");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cruge = new CrugeAuthassignment();
				$cruge->__SET('userid', $r->userid);
				$cruge->__SET('bizrule', $r->bizrule);
				$cruge->__SET('data', $r->data);
				$cruge->__SET('itemname', $r->itemname);
				
				$result[] = $cruge;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}