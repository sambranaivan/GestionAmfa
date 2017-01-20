<?php 

$q = "SELECT R.numero,S.nombre, S.dni, monto,DATE_FORMAT(R.fecha, '%d/%m/%Y') as Fecha,C.descripcion, observaciones FROM recibos R
left join socios S
on R.socioId = S.id
left join conceptos C 
on R.concepto = C.id";
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
			row($row);
		}
		echo "</table>";
	}
	else
	{
		echo "No ROws";
	}
}





function row($variable)
{
	echo "<tr>";
	foreach ($variable as $key => $value) {
		echo "<td>".$value."</td>";
	}
	echo "</tr>";
}
function head($variable)
{
	
	foreach ($variable as $key => $value) {
		echo "<td>".$key."</td>";
	}

}


 ?>