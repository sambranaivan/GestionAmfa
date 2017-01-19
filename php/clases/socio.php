<?php 


/**
* Clase Socios
*/
class Socio
{
	private $id;
	private $dni;
	private $nroSocio;
	private $domicilio;
	private $nombre;
	private $telefono;
	
	function __construct($_dni,$_nombre,$_domicilio,$_telefono,$_nroSocio)
	{

		global $db;
		$query = "INSERT IGNORE INTO socios (dni,nombre,domicilio,telefono,nroSocio) values ($_dni,'$_nombre','$_domicilio','$_telefono',$_nroSocio)"; 
		$r = $db->query($query);

		if ($db->errno) 
		{
			echo($db->error);
			return false;
		}
		else
		{
			// construct
			$query = "SELECT id from socios where dni = $_dni";
			$r = $db->query($query);
			if ($r) 
			{
				$data = $r->fetch_assoc();
				$this->id = $data['id'];
				$this->dni = $_dni;
				$this->nroSocio = $_nroSocio;
				$this->domicilio = $_domicilio;
				$this->nombre = $_nombre;
				$this->telefono = $_telefono;
				return true;
			}
			else
			{
				echo($db->error);
				return false;
			}

		}
	}

	// function getId()
	// {
	// 	return $this->id;
	// }

	function getDni()
	{
		return $this->dni;
	}

	function Show()
	{
		echo "id->".$this->id." ".$this->getNombre()."</br>";
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getDomicilio()
	{
		return $this->domicilio;
	}

	function getDireccion()
	{
		return $this->getDomicilio();
	}

	function getID()
		{
			return $this->id;
		}
}


 ?>