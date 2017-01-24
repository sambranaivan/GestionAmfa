<?php 
require_once("php/conection.php");

define("FARMACIA", 1);
define("CIRUGIA", 2);
define("ORTOPEDIA", 3);
define("ECONOMICA", 4);
define("CUOTA", 5);
define("PROVEEDURIA", 6);
define("NACIMIENTO", 7);
define("CASAMIENTO", 8);


function getGastos($mes, $anio, $saldo)
{
	global $db;
	global $saldo;
	$q = "SELECT * FROM gastos where MONTH(fecha) = $mes AND YEAR(fecha) = $anio";
	$r = $db->query($q);

	if ($db->errno) 
	{
		echo $db->error;
		return $saldo;
	}
	else
	{
		if ($r->num_rows) 
		{
			// hay registros
			$total = 0;
			while ($row = $r->fetch_assoc()) 
			{echo '<tr class="gastos">';
				echo "<td>Gastos</td>";
				echo "<td>".$row['fecha']."</td>";
				echo "<td>".$row['recibo']."</td>";
				echo "<td>".$row['referencia']."</td>";
				echo "<td></td>";
				echo "<td>".$row['monto']."</td>";
				echo "<td></td>";
				echo "</tr>";
				$total += $row['monto'];
			}
			echo '<tr class="gastos">';
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td><strong>$ ".$total."</strong></td>";
				$saldo = $saldo - $total;
				echo "<td><strong>$ ".($saldo)."</strong></td>";
				echo "</tr>";
			return $saldo;
		}
		else
		{
			return $saldo;
		}
	}
}

function getRecibo($mes, $anio, $concepto, $saldo)
{
	global $db;
	global $saldo;
	$q = "select numero,monto,R.fecha as fecha,completo from recibos R left join conceptos C on R.concepto = c.id where R.concepto = $concepto AND (MONTH(R.fecha) = $mes and YEAR(R.fecha) = $anio)";
	$r = $db->query($q);

	if ($db->errno) 
	{
		echo $db->error;
		return $saldo;
	}
	else
	{
		if ($r->num_rows) 
		{
			// hay registros
			$total = 0;
			$clase = getClase($concepto);
			while ($row = $r->fetch_assoc()) 
			{
				echo '<tr class="'.$clase.'">';
				echo "<td>".$clase."</td>";
				echo "<td>".$row['fecha']."</td>";
				echo "<td>".$row['numero']."</td>";
				echo "<td>".$row['completo']."</td>";
				echo "<td></td>";
				echo "<td>".$row['monto']."</td>";
				echo "<td></td>";
				echo "</tr>";
				$total += $row['monto'];
			}
				echo '<tr class="'.$clase.'">';
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td></td>";
				echo "<td><strong>$ ".$total."</strong></td>";
				echo "<td><strong>$ ".($saldo-$total)."</strong></td>";
				echo "</tr>";
				return $saldo;
		}
		else
		{
			return $saldo;
		}
	}
}


function getClase($c)
{
	switch ($c) {

			case FARMACIA:
			return "FARMACIA";
			break;
			case CIRUGIA:
			return "CIRUGIA";
			break;
			case ORTOPEDIA:
			return "ORTOPEDIA";
			break;
			case ECONOMICA:
			return "ECONOMICA";
			break;
			case CUOTA:
			return "CUOTA";
			break;
			case PROVEEDURIA:
			return "PROVEEDURIA";
			break;
			case NACIMIENTO:
			return "NACIMIENTO";
			break;
			case CASAMIENTO:
			return "CASAMIENTO";
			break;

		default:
			# code...
			break;
	}
}













 ?>