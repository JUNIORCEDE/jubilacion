<?php
class CrugeSessionModel
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
			$stm = $this->pdo->prepare("SELECT * FROM cruge_session");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cruge = new CrugeSession();
				$cruge->__SET('idsession', $r->idsession);
				$cruge->__SET('iduser', $r->iduser);
				$cruge->__SET('created', $r->created);		
				$cruge->__SET('expire', $r->expire);
				$cruge->__SET('status', $r->status);	
				$cruge->__SET('ipaddress', $r->ipaddress);
				$cruge->__SET('usagecount', $r->usagecount);	
				$cruge->__SET('lastusage', $r->lastusage);
				$cruge->__SET('logoutdate', $r->logoutdate);	
				$cruge->__SET('ipaddressout', $r->ipaddressout);
				$result[] = $cruge;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}