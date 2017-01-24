<?php 
require_once('php/conection.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	
	<title>Cobros</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/gastos.js"></script>
</head>
<body>
<form method="POST" action="php/save_gastos.php">
	<input type="text" name="beneficiario" placeholder="beneficiario">
	<input type="text" name="referencia" placeholder="referencia">
	<input type="text" name="recibo" placeholder="recibo">
	<input type="number" name="monto" placeholder="monto" min="0" step="0.01">
	<input type="date" name="fecha" placeholder="fecha"> 
	<input type="submit" value="Enviar">
</form>

<div>
	<?php 
	require_once("detalle_gastos.php");
	 ?>
</div>
</body>
</html>