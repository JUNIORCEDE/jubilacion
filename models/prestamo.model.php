<?php
class PrestamoModel
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
			$stm = $this->pdo->prepare("SELECT * FROM prestamos limit 0, 16000");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$prest = new Prestamo();
				$prest->__SET('codigo', $r->codigo);
				$prest->__SET('id_prest', $r->id_prest);
				$prest->__SET('cedula', $r->cedula);
				$prest->__SET('ini_mes', $r->ini_mes);
				$prest->__SET('ini_anio', $r->ini_anio);
				$prest->__SET('fin_mes', $r->fin_mes);
				$prest->__SET('fin_anio', $r->fin_anio);
				$prest->__SET('monto', $r->monto);
				$prest->__SET('saldo', $r->saldo);
				$prest->__SET('estado', $r->estado);
				$prest->__SET('periodos', $r->periodos);
				$prest->__SET('cuota', $r->cuota);
				$prest->__SET('observa', $r->observa);
				$result[] = $prest;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}
}