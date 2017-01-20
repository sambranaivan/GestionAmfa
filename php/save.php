<?php 

/***
*** Back End Procedimiento de guardar recibos
y su respectivas tablas
***
***/


// print_r($_POST);
require_once("conection.php");
require_once("clases/socio.php");
require_once("clases/recibo.php");


// Datos del Socio
$dni = $_POST['dni'];
$nroSoc = $_POST['nroSoc'];
$nombre = $_POST['nombre'];
$domicilio = $_POST['domicilio'];
$telefono = $_POST['telefono'];

$monto = $_POST['monto'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$obs = $_POST['obs'];
$concepto = $_POST['concepto'];



if($socio = new Socio($dni,$nombre,$domicilio,$telefono,$nroSoc))
{
	if ($recibo = new Recibo($socio,$numero,$fecha,$obs,$concepto,$monto)) 
	{
		header("location: ../pagos.php");
	}
	else
	{
		echo "Error Recibo";
	}
	
}
else
{
	echo "Error Socio";
}



 ?>