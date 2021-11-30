<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
// Importar la conexion
include 'DBConfig.php';
 
// Conectar a la base de datos
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Obteniendo los datos en la variable $json.
 $json = file_get_contents('php://input');
 
 // Decodificando los datos en formato JSON en la variables $obj.
 $obj = json_decode($json,true);
 
 // Crear variables por cada campo.

 $S_BookId = $obj['libroId'];
 
 $S_UserId = $obj['usuarioId'];
 
 $S_Date = $obj['fecha'];
 
 // Instrucción SQL para agregar el estudiante.
 $Sql_Query = "insert into renta (libroId,usuarioId,fecha) values ('$S_BookId','$S_UserId','$S_Date')";

 if(mysqli_query($con,$Sql_Query)){
 
    $MSG = 'Renta registrada correctamente...' ;
 
    // $json = json_encode($MSG);
 
    // echo $json ;
 
 }
 else{
 
    //echo 'Inténtelo de nuevo...';
    $MSG = 'Inténtelo de nuevo...';
 }
 $json = json_encode($MSG);
 echo $json;
 mysqli_close($con);
?>