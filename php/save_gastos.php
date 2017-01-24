<?php 

require_once("conection.php");
require_once("clases/gastos.php");

$beneficiario = $_POST['beneficiario'];
$referencia = $_POST['referencia'];
$recibo = $_POST['recibo'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];



if($gasto = new Gasto($beneficiario,$referencia,$recibo,$monto,$fecha))
{
	header("location: ../gastos.php");
}
else
{
	echo "error stop</br>";
}









 ?>