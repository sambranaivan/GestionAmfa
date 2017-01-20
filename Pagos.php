<?php 
require_once('php/conection.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- <meta charset="UTF-8"> -->
	<title>Pagos</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/pagos.js"></script>
</head>
<body>
<div>
	
	<form action="php/save.php" method="post">
			
		<p> Datos del Socio
			<input type="text" placeholder="dni" name="dni" id="form_dni" required>
			<input type="text" placeholder="nroSoc" name="nroSoc" id="form_nroSoc" required>
			<input type="text" placeholder="nombre" name="nombre" id="form_nombre" required>
			<input type="text" placeholder="domicilio" name="domicilio" id="form_domicilio" required>
			<input type="text" placeholder="telefono" name="telefono" id="form_telefono" required>
		</p>

		<p>	Datos del Recibo	
		<select name="concepto" id="concepto" required>
			<option disabled selected value> -- Elija un opcion -- </option>
				<option value="1">Farmacia</option>
				<option value="7">Nacimiento</option>
				<option value="8">Casamiento</option>
				<option value="2">Cirugia</option>
				<option value="4">Ayuda Economica</option>
				<option value="3">Ortopedia</option>
				<option value="6">Proveeduria</option>
				<option value="5">Pago de Cuota</option>
			</select>
			<input type="number" name="monto" min="1" step="0.1" placeholder="monto" required>
			<input type="text" name="numero" placeholder="000-000001" required>
			<input type="date" name="fecha" id="fecha" required>
			<input type="text" name="obs" placeholder="observaciones" required>
		</p>
		<p id="datos_ayec">
		Numero de Cuenta
			<input type="text" name="cuenta" id="form_cuenta" placeholder="Numero de Cuenta">
			<input type="text" name="cuotas" id="form_cuotas" placeholder="Numero de Cuotas">
			<input type="text" name="cuotasMonto" id="form_cuotasMonto" placeholder="Monto de Cuotas">
		</p>
		<p>
			<input type="submit" value="Guardar">
		</p>

	</form>
</div>
<div id="detail">
	<?php 
	require_once('detalle_recibos.php');
	 ?>
</div>
</body>
</html>