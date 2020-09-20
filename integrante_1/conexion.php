<?php 

function OpenCon()
{
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "autos";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die ("No se puede establecer la conexión: %s\n". $conn -> error);

	return $conn;
}
function CloseCon($conn)
{
	$conn -> close();
}


?>