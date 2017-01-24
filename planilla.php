<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/planilla.js"></script>
</head>
<body>
<?php require_once("functions.php");?>
<table>
	

	
	<tr>
	<!-- Saldo Anterior -->
		<td>Saldo Anterior</td>
		<td><!-- Fecha --></td>
		<td><!-- Comprobante --></td>
		<td><!-- Concepto --></td>
		<td><!-- Ingreso --></td>
		<td><!-- Egreso --></td>
		<td>$00.00</td>
	</tr>
	<tr>
	<!-- Deposito -->
		<td>Deposito</td>
		<td>04/01/2017</td>
		<td><!-- Comprobante --></td>
		<td><!-- Concepto --></td>
		<td><!-- Ingreso --></td>
		<td><!-- Egreso --></td>
		<?php 
		$saldo = 60000; 
		echo "<td>$ ".$saldo."</td>";
		?>
		
	</tr>
	<tr><td>. </td></tr>
	<tr>
		<td>Rubro</td>
		<td>Fecha</td>
		<td>Comprobante</td>
		<td>Concepto</td>
		<td>Ingreso</td>
		<td>Egreso</td>
		<td>Saldo</td>
	</tr>
	<tr>
	<!-- Pagos -->
		<td>Rubro</td>
		<td>Fecha</td>
		<td>Comprobante</td>
		<td>Concepto</td>
		<td>Ingreso</td>
		<td>Egreso</td>
		<td>Saldo</td>
	</tr>
	<?php 
	$saldo = getGastos(1,2017,$saldo);
	$saldo = getRecibo(1,2017,FARMACIA,$saldo);
	$saldo = getRecibo(1,2017,CIRUGIA,$saldo);
	$saldo = getRecibo(1,2017,ECONOMICA,$saldo);
	$saldo = getRecibo(1,2017,NACIMIENTO,$saldo);
	$saldo = getRecibo(1,2017,CASAMIENTO,$saldo);
	?>
	
	<tr>
	<!-- Totales -->
		<td>Rubro</td>
		<td>Fecha</td>
		<td>Comprobante</td>
		<td>Concepto</td>
		<td>Ingreso</td>
		<td>Egreso</td>
		<td>Saldo</td>
	</tr>
</table>
</body>
</html>