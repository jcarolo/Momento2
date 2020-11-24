<?php
include ("BaseDatos.php");

//Recibo id
$id=$_GET["id"];
echo ($id);
//  Instanciar clase BD
$transaccion= new BaseDatos ();

//Crear consulta SQL

$consultaSQL= "DELETE FROM libros WHERE idLibro='$id'";

//3. Uso metodo eliminarDatos
$transaccion->eliminarDatos($consultaSQL);



?>