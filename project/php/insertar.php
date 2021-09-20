<?php 

	require_once "../config/configDB.php";

	$conexion=conex();

	$id=$_POST['id_persona'];
	$nombre=$_POST['nombren'];
	$apellido=$_POST['apellidon'];
	$fecha=$_POST['fechan'];
	$correo=$_POST['correo'];
	$direccion=$_POST['direccion'];
	$nacionalidad=$_POST['nacionalidad'];
	$deptonac=$_POST['deptonac'];
	$cel=$_POST['cel'];
	$profesion=$_POST['profesion'];
	$pretension=$_POST['pretension'];

	$sql="CALL sp_insertar_datos('$id',
								 '$nombre',
								 '$apellido',
								 '$fecha',
								 '$correo',
								 '$direccion',
								 '$nacionalidad',
								 '$deptonac',
								 '$cel',
								 '$profesion',
								 '$pretension')";

	echo mysqli_query($conexion,$sql);

 ?>