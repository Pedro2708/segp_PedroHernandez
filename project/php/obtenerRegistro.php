<?php 

	require_once "../config/configDB.php";
	$conexion=conex();

	$id_u=$_POST['id_p'];
	$sql="select * from persona where id = $id_u";

	$result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$datos=array(
			'id_personau'=>$ver[0],
            'nombreu'=>$ver[1],
            'apellidou'=>$ver[2],
            'fechanu'=>$ver[3],
            'correou'=>$ver[4],
            'direccionu'=>$ver[5],
            'nacionalidadu'=>$ver[6],
            'deptonacu'=>$ver[7],
            'celu'=>$ver[8],
            'profesionu'=>$ver[9],
            'pretensionu'=>$ver[10]
					);
	echo json_encode($datos);
 ?>



