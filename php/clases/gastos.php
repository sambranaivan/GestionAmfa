<?php 
/**
* 
*/
class Gasto
{
private $beneficiario;
private $referencia;
private $recibo;
private $monto;
private $fecha;
private $id;
	
	function __construct($benef,$ref,$rec,$monto,$fecha)
	{
		global $db;

		$q = "INSERT INTO gastos (beneficiario,referencia,recibo,monto,fecha) values ('$benef','$ref','$rec',$monto,'$fecha')";
		

		$r = $db->query($q) ;

		if($db->errno){
			echo $db->error;
			return false;
		}
		else
		{
			$this->SetBeneficiario($benef);
			$this->SetReferencia($ref);
			$this->SetRecibo($rec);
			$this->SetMonto($monto);
			$this->SetFecha($fecha);
			// set Id

		$res = $db->query("SELECT id FROM gastos where recibo = '$rec'");
		if ($res->num_rows) 
		{
				$res = $res->fetch_assoc();
				$this->setId($res['id']);
				return true;
			}
			else
			{
				if ($db->errno)	{echo $db->error;}

				return false;
		}
		}
	}
	function SetBeneficiario($beneficiario)
	{
		$this->beneficiario = $beneficiario;
	}
	function SetReferencia($referencia)
	{
		$this->referencia = $referencia;
	}
	function SetRecibo($recibo)
	{
		$this->recibo = $recibo;
	}
	function SetMonto($monto)
	{
		$this->monto = $monto;
	}
	function SetFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	// getters
	function GetBeneficiario()
	{
		return $this->beneficiario;
	}
	function GetReferencia()
	{
		return $this->referencia;
	}
	function GetRecibo()
	{
		return $this->recibo;
	}
	function GetMonto()
	{
		return $this->monto;
	}
	function GetFecha()
	{
		return $this->fecha;
	}
	function GetId()
	{
		return $this->id;
	}
}

 ?>