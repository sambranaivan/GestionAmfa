<div id="detalle_recibos">
<?php 

$q = "SELECT DATE_FORMAT(R.fecha, '%d/%m/%Y') as Fecha , R.numero, S.nrosocio ,S.nombre, S.dni,REPLACE(monto,'.',',') as monto, C.descripcion, observaciones, c.id as concepto FROM recibos R
left join socios S
on R.socioId = S.id
left join conceptos C 
on R.concepto = C.id order by concepto asc, R.fecha asc, R.numero asc";

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
			$clase = getClase($row['concepto']);
			echo '<tr class="'.$clase.'">';
			row($row);
		}
		
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
 </div>