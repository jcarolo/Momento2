<?php

include ("BaseDatos.php");

if (isset($_POST["botonEditar"])){

   //1. Recibe dato a actualizar 

$titulo= $_POST["tituloEditar"];
$descripcion= $_POST["descripcionEditar"];

//2. recibo id a actualizar
$id=$_GET["id"];


//3. instanciar clase
$transaccion=new BaseDatos();

//4. crear consulta editar SQL

$consultaSQL="UPDATE libros SET titulo='$titulo',descripcion='$descripcion' WHERE idLibro='$id'";

// 5. Aceder a método editar datos
$transaccion->editarDatos($consultaSQL);

//6. Redirección

header ("location: listaLibros.php");

}

?>