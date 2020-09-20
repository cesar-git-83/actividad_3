<?php

        include 'conexion.php';
        $conn = OpenCon();
        $sql = "SELECT * FROM auto WHERE id= '".$_GET['codigo']."'";
        $datos = $conn -> query ("SELECT * FROM marcas");

        $result = $conn->query($sql);

        if ($result->num_rows > 0){

            while($data = $result->fetch_assoc()){
            $id = $data["id"];
            $marcas = $data['marcas'];
            $nombre = $data['nombre'];
            $descripcion = $data['descripcion']; 
            $tipoCombustible = $data['tipoCombustible']; 
            $CantidadPuertas = $data['CantidadPuertas']; 
            $precio = $data['precio']; 
            }

           }else {
                ?>
                    <div class="card-body">
                        <p>No se encontraron registros.</p>
                    </div>
                <?php
            }

         if(isset($_POST["submit"])){
           
            // Verificamos la conexión
            if ($conn->connect_error) {
               die("No se pudo conectar a la base de datos: " . $conn->connect_error);
            } else {

          if (isset($_GET['codigo'])){

            $id = $_POST['id'];
            $marcas = $_POST['marcas'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $tipoCombustible = $_POST['tipoCombustible'];
            $CantidadPuertas = $_POST['CantidadPuertas'];
            $precio = $_POST['precio'];

          $query = "UPDATE auto SET
          id='$id',marcas='$marcas', nombre='$nombre', descripcion='$descripcion', tipoCombustible='$tipoCombustible', CantidadPuertas='$CantidadPuertas', precio='$precio' 
          WHERE id= '".$_GET['codigo']."'";

           $query_run = mysqli_query($conn, $query);

            if (mysqli_query($conn, $query)) {

               echo "<div class=\"alert alert-success\" role=\"alert\">";
               echo "Se ha actualizado la editorial";
               echo "</div>";
            } else {
               echo "<div class=\"alert alert-danger\" role=\"alert\">";
               echo "No se pudo actualizar la editorial. ";
               echo "Error: " . $query . "" . mysqli_error($conn);
               echo "</div>";               
            } 
            $conn->close();
             }
            }
          }
      ?>

<!doctype html>
<html lang="es">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" />
    <title>Editoriales</title>
  </head>
  <body>
    <br/>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Modificar Autos</h4>
            </div>
            <div class="card-body">
                 <form action = "" method = "POST">
                    <label>Código:</label>
                    <input type = "text" name = "id" id = "id" value="<?php echo $id; ?>" class="form-control" />
                    <br />
                    <label>Seleccione Marca:</label>
                    <select name="marcas" id="marcas"class="form-control">Marcas
                      <?php
                      
                       while($marcass= mysqli_fetch_array($datos))
                       {
                      ?>
                    <option value="<?php echo $marcass['nombre_marca'];?>"> <?php echo $marcass['nombre_marca'];?></option>
                    <?php  
                        }
                         
                    ?>
                    </select>
                    <br />
                    <label>Nombre:</label>
                    <input type = "text" name = "nombre" value="<?php echo $nombre; ?>" id = "nombre" class="form-control"/>
                    <br />
                    <label>Descripcion:</label>
                    <input type = "text" name = "descripcion" value="<?php echo $descripcion; ?>" id = "descripcion" class="form-control"/>
                    <br />
                    <label>Tipo de Combustible:</label>
                    <input type = "text" name = "tipoCombustible" value="<?php echo $tipoCombustible; ?>" id = "tipoCombustible" class="form-control"/>
                    <br />
                    <label>Cantidad de Puertas:</label>
                    <input type = "text" name = "CantidadPuertas" value="<?php echo $CantidadPuertas; ?>" id = "CantidadPuertas" class="form-control"/>
                    <br />
                    <label>Precio:</label>
                    <input type = "text" name = "precio" value="<?php echo $precio; ?>" id = "precio" class="form-control"/>
                    <br />
                    <input type = "Submit" value ="Actualizar" name = "submit" class="btn btn-success"/>
                    <a class="btn btn-info" href="listar_autos.php">Regresar</a>
                    <br />
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

