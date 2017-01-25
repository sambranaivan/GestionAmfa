<?php 
require_once("php/conection.php");



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
	$q = "select numero,REPLACE(monto,'.',',') as monto,R.fecha as fecha,completo from recibos R left join conceptos C on R.concepto = c.id where R.concepto = $concepto AND (MONTH(R.fecha) = $mes and YEAR(R.fecha) = $anio) order by R.fecha asc";
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
				$total =  $total + $row['monto'];
			}
				echo '<tr class="'.$clase.'">';
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














 ?>