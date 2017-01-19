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

/*
1º Guardar las refencias

$socio = new Socio(dni,nombre,direccion,telefono)
Ultima Guardar el Recibo
$recibo = new Recibo($socio->getId(),monto,concepto,nroRecibo,fecha,observaciones)

Ultimo Guarda la Ayuda Economica
if concepto = 4

$ayec = new ayec($socio->id,$recibo->id,$monto,cuotas,montocuotas)




*/

$socio = new Socio($dni,$nombre,$domicilio,$telefono,$nroSoc);
$socio->show();
$recibo = new Recibo($socio,$numero,$fecha,$obs,$concepto,$monto);

$recibo->show();

 ?>