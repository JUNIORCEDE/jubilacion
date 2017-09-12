<?php
class Model
{
	private $pdo;
	public $result;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=fblearnc_jubilacion', 'fblearnc_admin', 'Proyecto1234');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->exec("set names utf8");		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar($sentencia)
	{
		try
		{
			$this->result=Array();
			$stm = $this->pdo->prepare($sentencia);
			$stm->execute();
			$this->result = $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}