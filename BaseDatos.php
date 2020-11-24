<?php

class BaseDatos{
//Variable
public $usuarioBD="root";
public $passwordBD="";
//Constructor

public function __construct(){}

public function conectarBD(){   

try {
        $infoBD="mysql:host=localhost;dbname=libreria";
         $conexionBD= new PDO($infoBD, $this->usuarioBD, $this->passwordBD);
        return($conexionBD);

}catch(PDOException $error){
    //captura error
     echo($error ->getMessage());
}
}
public function  agregarDatos($consultaSQL)
{
  //1.conexionBD
    $conexionBD= $this-> conectarBD();

    //2. Preparar consulta
    $consultaAgregarDatos= $conexionBD-> prepare($consultaSQL);

    //3.ejecutar
   $resultado= $consultaAgregarDatos->execute();

    //4. verificar
    if ($resultado){
echo ("registro agregado con éxito");

    } else {
        echo ("error en ingreso");
    } 
}

public function  buscarDatos($consultaSQL)
{
  //1.conexionBD
    $conexionBD= $this-> conectarBD();

    //2. Preparar consulta
    $consultaBuscarDatos= $conexionBD-> prepare($consultaSQL);

    //3.indar como recibir datos con un arreglo
       $consultaBuscarDatos->setFetchMode(PDO::FETCH_ASSOC);

    //4. ejecutar

    $consultaBuscarDatos->execute();

    //5.Retornar datos FetchAll método de PDO para traer todos los datos
 return ($consultaBuscarDatos->fetchAll());
    
}

public function eliminarDatos($consultaSQL){

//1.conexionBD
$conexionBD= $this-> conectarBD();

//2. Preparar consulta
$consultaEliminarDatos= $conexionBD-> prepare($consultaSQL);

//3.ejecutar
$resultado= $consultaEliminarDatos->execute();

//4. verificar
if ($resultado){
echo ("registro Eliminado con éxito");

} else {
    echo ("error Eliminando el registro");
} 

}

public function editarDatos($consultaSQL){

//1.conexionBD
$conexionBD= $this-> conectarBD();

//2. Preparar consulta
$consultaEditarDatos= $conexionBD-> prepare($consultaSQL);

//3.ejecutar
$resultado= $consultaEditarDatos->execute();

//4. verificar
if ($resultado){
echo ("registro editado con éxito");

} else {
    echo ("error en edicion de registro");
} 

}

}

?>