<?php

$server = 'localhost';
$usuario = 'root';
$contrasena = '';
$db = 'tst1';


// Creando conexion

//FORMA1
//$conn = mysqli_connect($server, $usuario, $contrasena, $db);

//FORMA2
$conn = new PDO("mysql:host=localhost;dbname=tst1", $usuario, $contrasena);

/*// Revisando conexion

if (!$conn) {
    
	die("La conexion ha fallado: " . mysqli_connect_error());
}
echo "Conexion exitosa!! :)";
mysqli_close($conn);*/


?>