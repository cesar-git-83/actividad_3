<?php

        include 'conexion.php';
        $conn = OpenCon();
        $sql = "SELECT * FROM auto WHERE id= '".$_GET['codigo']."'";
        $sql1 = "SELECT * FROM marcas WHERE id= '".$_GET['codigo']."'";
        $datos = $conn -> query ("SELECT * FROM marcas");

        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);

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

            while($row = $sql->fetch_assoc()){
                  

                        echo "<tr>";
                        echo "<td>" . $row["id"]. "</td>";
                       
                        echo "<td>" . $row["marcas"]. "</td>";
                       
                        echo "<td>" . $row["nombre"]. "</td>";
                        echo "<td>" . $row["descripcion"]. "</td>";
                        echo "<td>" . $row["tipoCombustible"]. "</td>";
                        echo "<td>" . $row["CantidadPuertas"]. "</td>";
                         echo "<td>$" . $row["precio"]. "</td>";
                        echo "<td>";}

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
                <h4>Informacion General</h4>
            </div>
            <div class="card-body">
                 <form action = "" method = "POST">
                  <table class="table">

  <tr>

    <td>Código:</td>

    <td><?php echo $id; ?></td>

  </tr>

  <tr>

    <td>Marca:</td>

    <td><?php echo $marcas; ?></td>

  </tr>
  <tr>

    <td>Nombre:</td>

    <td><?php echo $nombre; ?></td>

  </tr>
  <tr>

    <td>Descripcion:</td>

    <td><?php echo $descripcion; ?></td>

  </tr>
  <tr>

    <td>Combustible:</td>

    <td><?php echo $tipoCombustible; ?></td>

  </tr>
  <tr>

    <td>Cantidad de Puertas:</td>

    <td><?php echo $CantidadPuertas; ?></td>

  </tr>
  <tr>

    <td>Precio:</td>

    <td>$<?php echo $precio; ?></td>

  </tr>

</table>
                    
                    <br />
                    <input type = "Submit" value ="Comprar" name = "submit" class="btn btn-success"/>
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
