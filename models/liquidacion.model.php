<?php
class LiquidacionModel
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
			$stm = $this->pdo->prepare("SELECT * FROM liguidaciones");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$inte = new Liquidacion();
				$inte->__SET('codigo', $r->codigo);
				$inte->__SET('nombres', $r->nombres);
				$inte->__SET('cedula', $r->cedula);
				$inte->__SET('titulo', $r->titulo);
				$inte->__SET('fecha', $r->fecha);
				$inte->__SET('cantidad', $r->cantidad);
				$inte->__SET('detalle', $r->detalle);
				$result[] = $inte;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}