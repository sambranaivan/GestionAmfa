<?php 


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

 ?>