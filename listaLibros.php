  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listadolibros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-darrk bg-dark">
            <a class="navbar-brand" href="#">EvalucionWeb2</a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                 </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                     <a class="nav-link" href="formularioRegistro.php">Registro Inventario <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="listaLibros.php">Inventario Disponible</a>
                                </li>              

                            </ul>
                             <form class="form-inline my-2 my-lg-0">          
                        </form>
                    </div>
    </nav>        
</header>
<h1 align="center">Inventario Disponible Librería Nacional</h1>
        <hr>


<?php
//.consutaBD traer libros

//1. incluir archivo con clase BD
 include ("BaseDatos.php");
 //2. consulta SQL busca buscar datos
 $consultaSQL="SELECT * FROM libros WHERE 1";
 
 //3. Instancia clase

 $transaccion= new BaseDatos ();
 $transaccion-> buscarDatos($consultaSQL);
 $libros=$transaccion->buscarDatos($consultaSQL);

?>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
            <?php  foreach($libros as $libro):?>
                <div class="col mb-4">
                    <div class="card h-100">
                          <img src="<?php echo ($libro["foto"])?>" class="card-img-top" alt="imagen">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo($libro["titulo"])?></h5>
                                <p class="card-text"> <?php echo($libro["descripcion"])?> </p>
                                <p class="card-text"> <?php echo($libro["editorial"])?> </p>
                                <p class="card-text"> <?php echo($libro["precio"])?> </p>
                                <a href="eliminarlibros.php?id=<?php echo ($libro["idLibro"])?>"class ="btn btn-danger">Eliminar</a>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo($libro["idLibro"])?>">
                                 Editar
                                </button>                               
                            </div>
                    </div>
                    <div class="modal fade" id="editar<?php echo($libro["idLibro"])?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="editarLibros.php?id=<?php echo($libro["idLibro"])?>" method="POST">
                                    <div class="form-group">
                                        <label>Titulo:</label>
                                        <input type="text" class="form-control" name="tituloEditar" value= "<?php echo($libro["titulo"])?>">                                        
                                    </div>                           
                                    
                                    <div class="form-group">
                                        <label>Descripcion:</label>
                                        <textarea class="form-control" name="descripcionEditar"> <?php echo($libro["descripcion"])?> </textarea>                                        
                                    </div>                                      
                                    <button type="submit" class="btn btn-primary" name="botonEditar">Editar</button>                                 
                                    
                                    
                                    </form>
                                </div>                            
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>