<!doctype html>

<html lang="es">
  <head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" />
    <title>Autos y Marcas</title>
  </head>
  <body>
    <br/>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Agregar Marcas</h4>
            </div>
            <div class="card-body">
                <form action = "" method = "POST">
                    <label>id:</label>
                    <input type = "text" name = "id_marca" id = "id_marca" class="form-control" />
                    <br />
                    <label>nombre:</label>
                    <input type = "text" name = "nombre_marca" id = "nombre_marca" class="form-control"/>
                    <br />
                    <label>descripcion:</label>
                    <input type = "text" name = "descripcion_marca" id = "descripcion_marca" class="form-control"/>
                    <br />
                    <input type = "Submit" value ="Guardar" name = "submit" class="btn btn-success"/>
                    <a class="btn btn-info" href="listar_marcas.php">Regresar</a>
                    <br />
                </form>
            </div>
        </div>
    </div>

    <?php
         if(isset($_POST["submit"])){
            include 'conexion.php';
            $conn = OpenCon();
           
            // Verificamos la conexión
            if ($conn->connect_error) {
               die("No se pudo conectar a la base de datos: " . $conn->connect_error);
            } 

            
            $sql= "INSERT INTO marcas(id_marca, nombre_marca, descripcion_marca)
            VALUES ('".$_POST["id_marca"]."','".$_POST["nombre_marca"]."','".$_POST["descripcion_marca"]."')";

            if (mysqli_query($conn, $sql)) {
               echo "<div class=\"alert alert-success\" role=\"alert\">";
               echo "Se ha guardado la editorial";
               echo "</div>";
            } else {
               echo "<div class=\"alert alert-danger\" role=\"alert\">";
               echo "No se pudo guardar la editorial. ";
               echo "Error: " . $sql . "" . mysqli_error($conn);
               echo "</div>";               
            }
            $conn->close();
         }
      ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>