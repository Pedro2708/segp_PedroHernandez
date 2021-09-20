<?php 

	require_once "../config/configDB.php";

	$conexion=conex();

	$idu=$_POST['id_personau'];
	$nombreu=$_POST['nombreu'];
	$apellidou=$_POST['apellidou'];
	$fechau=$_POST['fechau'];
	$correou=$_POST['correou'];
	$direccionu=$_POST['direccionu'];
	$nacionalidadu=$_POST['nacionalidadu'];
	$deptonacu=$_POST['deptonacu'];
	$celu=$_POST['celu'];
	$profesionu=$_POST['profesionu'];
	$pretensionu=$_POST['pretensionu'];

	$sql="CALL sp_actualizar_datos('$idu',
								 '$nombreu',
								 '$apellidou',
								 '$fechau',
								 '$correou',
								 '$direccionu',
								 '$nacionalidadu',
								 '$deptonacu',
								 '$celu',
								 '$profesionu',
								 '$pretensionu')";
									
	echo mysqli_query($conexion,$sql);
 ?>