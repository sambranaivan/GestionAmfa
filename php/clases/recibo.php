<?php 

/**
* 
*/
class Recibo
{
	
	private $socio;
	private $numero;
	private $fecha;
	private $obs;
	private $concepto;
	private $monto;

	private $id;



	function __construct($_socio,$_numero,$_fecha,$_obs,$_concepto,$_monto)
	{
		global $db;
		$q = "INSERT INTO recibos (numero,socioId,monto,fecha,concepto,observaciones) Values ('$_numero',".$_socio->getID().",$_monto,'$_fecha',$_concepto,'$_obs') ON DUPLICATE KEY update monto = monto";

		$r = $db->query($q);
		
		if ($db->errno) 
		{
			echo $db->error;
		}
		else
		{
			//doo
		///setters
		$this->setsocio($_socio);
		$this->setnumero($_numero);
		$this->setfecha($_fecha);
		$this->setobs($_obs);
		$this->setconcepto($_concepto);
		$this->setmonto($_monto);

		// set Id

		$res = $db->query("SELECT id FROM recibos where numero = '$_numero'");
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

	


		function setsocio($_socio)
		{
			$this->socio = $_socio;
		}
		function setnumero($_numero)
		{
			$this->numero = $_numero;
		}
		function setfecha($_fecha)
		{
			$this->fecha = $_fecha;
		}
		function setobs($_obs)
		{
			$this->obs	= $_obs;
		}
		function setconcepto($_concepto)
		{
			$this->concepto	 = $_concepto;
		}
		function setmonto($_monto)
		{
			$this->monto= $_monto;
		}

		function setId($_is)
		{
			$this->id = $_is;
		}

		function getID()
		{
			return $this->id;
		}


		function getNumero()
		{
			return $this->numero;
		}

		function show()
		{
			echo "Recibo ID->".$this->getID()." Numero: ".$this->getNumero()."</br>";;
		}

}

 ?>