<?php 

	require_once "../config/configDB.php";

	$conexion=conex();
	$id=$_POST['id'];
	$sql="CALL sp_eliminar_datos('$id')";
	echo mysqli_query($conexion,$sql);
 ?>