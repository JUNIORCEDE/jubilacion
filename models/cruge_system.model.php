<?php
class CrugeSystemModel
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
			$stm = $this->pdo->prepare("SELECT * FROM cruge_system");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$cruge = new CrugeSystem();
				$cruge->__SET('idsystem', $r->idsystem);
				$cruge->__SET('name', $r->name);
				$cruge->__SET('largename', $r->largename);		
				$cruge->__SET('sessionmaxdurationmins', $r->sessionmaxdurationmins);
				$cruge->__SET('sessionmaxsameipconnections', $r->sessionmaxsameipconnections);	
				$cruge->__SET('sessionreusesessions', $r->sessionreusesessions);
				$cruge->__SET('sessionmaxsessionsperday', $r->sessionmaxsessionsperday);	
				$cruge->__SET('sessionmaxsessionsperuser', $r->sessionmaxsessionsperuser);
				$cruge->__SET('systemnonewsessions', $r->systemnonewsessions);	
				$cruge->__SET('systemdown', $r->systemdown);
				$cruge->__SET('registerusingcaptcha', $r->registerusingcaptcha);
				$cruge->__SET('registerusingterms', $r->registerusingterms);	
				$cruge->__SET('terms', $r->terms);
				$cruge->__SET('registerusingactivation', $r->registerusingactivation);	
				$cruge->__SET('defaultroleforregistration', $r->defaultroleforregistration);
				$cruge->__SET('registerusingtermslabel', $r->registerusingtermslabel);	
				$cruge->__SET('registrationonlogin', $r->registrationonlogin);
				$result[] = $cruge;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}