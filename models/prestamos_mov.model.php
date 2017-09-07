<?php
class Prestamo_MovModel
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
			$stm = $this->pdo->prepare("SELECT * FROM prestamos_movimientos limit 0, 30000");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$prest = new Prestamo_Mov();
				$prest->__SET('codigo_movimiento', $r->codigo_movimiento);
				$prest->__SET('cedula', $r->cedula);
				$prest->__SET('numero', $r->numero);
				$prest->__SET('monto', $r->monto);
				$prest->__SET('cuota', $r->cuota);
				$prest->__SET('capital', $r->capital);
				$prest->__SET('interes', $r->interes);
				$prest->__SET('mes', $r->mes);
				$prest->__SET('anio', $r->anio);
				$prest->__SET('estado', $r->estado);
				$prest->__SET('id_prest', $r->id_prest);
				$prest->__SET('marca', $r->marca);
				$prest->__SET('saldo', $r->saldo);
				$result[] = $prest;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}