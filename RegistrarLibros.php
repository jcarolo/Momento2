<?php
include("BaseDatos.php");
     
    if (isset($_POST["botonEnvio"])){
        //recibir Datos
        $titulo=$_POST["titulo"];
        $editorial=$_POST["editorial"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $foto=$_POST["foto"];
       
        //objeto

        $transaccion= new BaseDatos ();
        
        //3. crear consultasql
        $consultaSQL="INSERT INTO libros(titulo,editorial,descripcion,precio, foto)VALUES ('$titulo','$editorial','$descripcion','$precio','$foto')";

        //4. llamar datos               
        $transaccion-> agregarDatos($consultaSQL);

        header ("location: formularioRegistro.php");



             
    }
?>