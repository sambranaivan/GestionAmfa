<?php 
require_once("conection.php");

$dni = $_GET['dni'];

if ($res = $db->query("SELECT nroSocio,nombre, domicilio, telefono FROM socios where dni = $dni")) 
{
	if ($res) 
	{
			$array = $res->fetch_assoc();
			// print_r($array);
		 header('Content-type: application/json; charset=utf-8');
 		 echo json_encode($array);

	}
	else
	{
			$array["error"] = 1; 
			// print_r($array);
		 header('Content-type: application/json; charset=utf-8');
 		 echo json_encode($array);
	}
}
 ?>