<?php 
define("FARMACIA", 1);
define("CIRUGIA", 2);
define("ORTOPEDIA", 3);
define("ECONOMICA", 4);
define("CUOTA", 5);
define("PROVEEDURIA", 6);
define("NACIMIENTO", 7);
define("CASAMIENTO", 8);


$_host = "localhost";
$_pass = "";
$_user = "root";
$_database = "amfa";

$db = new mysqli($_host,$_user,$_pass,$_database);
mysqli_set_charset($db, 'utf8');
/* comprobar la conexión */
if ($db->connect_errno) {
    printf("Falló la conexión: %s\n", $db->connect_error);
    exit();
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