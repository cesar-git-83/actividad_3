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
                <div class="row">
                    <div class="col-lg-10">
                        <h4>Lista de Autos</h4>
                    </div>
                    <div class="col-lg-2">
                        <a class="btn btn-success" href="agregar_autos.php"><i class="fas fa-plus"></i> Agregar</a>
                    </div>
                </div>                
            </div>

            <?php
            include 'conexion.php';
            $conn = OpenCon();
            
            $sql = "SELECT auto.id, marcas.nombre_marca, auto.nombre, auto.descripcion, auto.tipoCombustible, auto.CantidadPuertas, 
            auto.precio FROM auto, marcas";
            //$result= mysql_query($sql, $conn);
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {                
                ?>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Marca</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Tipo Combustible</th>
                            <th>Cantidad de Puertas</th>
                            <th>Precio</th>
                        </tr>                        
                    </thead>
                    <tbody>
                <?php
                    //for ($i=0; $i<$result; $i++) {
                    while($row = $result->fetch_assoc()){
                  

                        echo "<tr>";
                        echo "<td>" . $row["id"]. "</td>";
                        echo "<td>" . $row["nombre_marca"]. "</td>";
                        echo "<td>" . $row["nombre"]. "</td>";
                        echo "<td>" . $row["descripcion"]. "</td>";
                        echo "<td>" . $row["tipoCombustible"]. "</td>";
                        echo "<td>" . $row["CantidadPuertas"]. "</td>";
                         echo "<td>$" . $row["precio"]. "</td>";
                        echo "<td>";
                        echo "<a class=\"btn btn-warning\" href=\"modificar_autos.php?codigo=". $row["id"]."\"><i class=\"fas fa-edit\"></i></a> ";
                        echo "<a class=\"btn btn-danger\" href=\"eliminar_editorial.php?codigo=". $row["id"]."\"><i class=\"far fa-trash-alt\"></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                    </tbody>
                </table>
                <?php
            } else {
                ?>
                    <div class="card-body">
                        <p>No se encontraron registros.</p>
                    </div>
                <?php
            }

            CloseCon($conn);
        ?>

        </div>

        <?php
            if (isset($_GET['result'])) {
               if($_GET['result'] == 1) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">";
                    echo "Se ha eliminado la editorial";
                    echo "</div>";
               }else{
                    echo "<div class=\"alert alert-danger\" role=\"alert\">";
                    echo "No se pudo eliminar la editorial. ";                
                    echo "</div>";  
               }
            }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

