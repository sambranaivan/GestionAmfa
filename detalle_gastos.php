<?php 

$q = "SELECT DATE_FORMAT(fecha, '%d/%m/%Y') as fecha, recibo, beneficiario, monto, referencia FROM gastos";

$r = $db->query($q);

if ($db->errno) 
{
	echo $db->error;
}
else
{
	if ($r->num_rows) 
	{ echo "<table>";
		$head  = true;
		while ($row = $r->fetch_assoc()) 
		{
			if ($head) 
			{
				head($row);
				$head = false;
			}
			echo "<tr>";
			row($row);
		}
		///controls
		
		echo "</tr>";
		echo "</table>";
	}
	else
	{
		echo "No ROws";
	}
}





function row($variable)
{
	
	foreach ($variable as $key => $value) {
		echo "<td>".$value."</td>";
	}
	echo '<td><a href="#">Borrar</a></td>';
		echo '<td><a href="#">Editar</a></td>';
	
}
function head($variable)
{
	
	foreach ($variable as $key => $value) {
		echo "<td>".$key."</td>";
	}

}


 ?>