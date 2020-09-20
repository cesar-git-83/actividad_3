<?php
include ('conexion.php');
 $conn = OpenCon();
$sql="SELECT auto.id, marcas.nombre_marca FROM auto, marcas WHERE auto.id = marcas.nombre_marca";
$result= mysql_query($sql, $conn);

while($row=mysql_fetch_assoc($result)) {
  
echo $row['id'].$row['nombre_marca']."<br />";


}

?>