<?php

$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "proweb";



$conn = new mysqli($host, $user, $pwd, $db); //AGREGAR ,$db despues de realizar la conexion

if ($conn->connect_errno) {
    die("Fallo Conexión:" . $conn->connect_errno);
} //else echo "<b>Conexion exitosa";
//despues de realizar correctamente la conexion se comenta la linea 15
