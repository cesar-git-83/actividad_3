<?php
    if (isset($_GET['codigo'])) {
        include 'conexion.php';
        $conn = OpenCon();
           
        // Verificamos la conexión
        if ($conn->connect_error) {
            die("No se pudo conectar a la base de datos: " . $conn->connect_error);
            header('Location: /INTEGRANTE1/listar_autos.php?result=0');
        } 
        
        $sql = "DELETE FROM auto WHERE id = '".$_GET['codigo']."'";

            if (mysqli_query($conn, $sql)) {
                header('Location: /INTEGRANTE1/listar_autos.php?result=1');                
                exit();
            } else {
                header('Location: /INTEGRANTE1/listar_autos.php?result=0');
            }
            $conn->close();
    } else {
        header('Location: /INTEGRANTE1/listar_autos.php?result=0');
    }
?>