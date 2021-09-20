<?php 
	require_once "config/configDB.php";
	$conexion=conex();

	
	$sql = "select * from persona";
	$result=mysqli_query($conexion,$sql);
 ?>

<script>
function cambio(){
	const axios = require('axios');

	var info;
	let cambiom;

	axios.get('https://az.gt/tipodecambio/cambiodeldia.json')
	.then(respuesta => {
		info = respuesta;
		cambio = (info.data.TipoCambioDiaResult.Cambio.VarDolar.referencia)
		console.log(cambio);
	}).catch(error => {
		console.log(error)
	})
	
}


</script>

 <br>

<span class="btn btn-outline-primary" data-toggle="modal" data-target="#addmodal">
			<span class="fa fa-plus-circle"></span> Insertar Nuevo Registro
			</span>
			
	<style>
    .thead-green {
      background-color: rgb(23, 116, 167);
      color: white;
    }
  	</style>		


<div class="table-responsive" style= "text-align: left;">
  
<table id="example" class="table table-striped table-hover">
		<thead class="thead-green">
		<tr style="font-weight: bold" >
			<td>CUI</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Fecha Nac</td>
			<td>Correo</td>
			<td>Direccion</td>
			<td>Nacionalidad</td>
			<td>Deptp. Nac.</td>
			<td>Celular</td>
			<td>Profesion Universitaria</td>
			<td>Pretension Salarial GTQ</td>
			<td>Pretencion Salarial USD</td>
			<td style="text-align: center;">Editar</td>
			<td style="text-align: center;">Eliminar</td>
		</tr>
		</thead>
	<?php 
		$cambiousd = 7.73;
		while ($ver=mysqli_fetch_row($result)):
	 ?>
		<tr>
			<td><?php echo $ver[0]; ?></td>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>
			<td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td><?php echo $ver[8]; ?></td>
			<td><?php echo $ver[9]; ?></td>
			<td><?php echo "Q $ver[10]"; ?></td>
			<?php $cambio = $ver[10] / $cambiousd ; ?>
			<td><?php $cambio =round($cambio,2); echo"$ $cambio" ?></td>
			
			<td style="text-align: center;">
				<span class="btn btn-outline-warning" 
				onclick="obtenDatos('<?php echo $ver[0]; ?>')" data-toggle="modal" data-target="#updatemodal">
					<span class="fa fa-pencil-square-o"></span> Editar
				</span>
			</td>
			<td style="text-align: center;">
				<span class="btn btn-outline-danger"  
					onclick="elimina('<?php echo $ver[0]; ?>')">
					<span class="fa fa-trash"></span> Eliminar
				</span>
			</td>
		</tr>

		<?php 
			endwhile;
		 ?>
</table>
</div>