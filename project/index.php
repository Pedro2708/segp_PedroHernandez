<!DOCTYPE html>
<html>
<title>CV PERSONAS</title>
<head>
  <?php require_once "dependencias.php"; ?>
<?php

require_once "config/configDB.php";
require_once "controller/C_persona.php";
require_once "dependencias.php";


$control = new Coper();
$control->c();
?>

</head>
<body>
<img src="logoUMG.png">
	<div class="container">
		<br>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<div id="table"></div>
			</div>
		</div>
	</div>


  <!--

  FORMULARIO PARA AGREGAR NUEVOS DATOS
  -->
  <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nueva persona</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<form id="frmAgrega">
            <label>CUI</label>
        		<input type="text" class="form-control form-control-sm" name="id_persona" id="id_persona">
        		<label>Nombre</label>
        		<input type="text" class="form-control form-control-sm" name="nombren" id="nombren">
        		<label>Apellido</label>
        		<input type="text" class="form-control form-control-sm" name="apellidon" id="apellidon">
        		<label>Fecha Nacimiento</label>
        		<input type="date" class="form-control form-control-sm" name="fechan" id="fechan">
            <label>Correo</label>
        		<input type="email" class="form-control form-control-sm" name="correo" id="correo">
            <label>Direccion</label>
        		<input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
            <label>Nacionalidad</label>
        		<input type="text" class="form-control form-control-sm" name="nacionalidad" id="nacionalidad">
            <label>Departamento de Nacimiento</label>
        		<input type="text" class="form-control form-control-sm" name="deptonac" id="deptonac">
            <label>Celular</label>
        		<input type="text" class="form-control form-control-sm" name="cel" id="cel">
            <label>Profesion</label>
        		<input type="text" class="form-control form-control-sm" name="profesion" id="profesion">
            <label>Pretension Salarial</label>
        		<input type="text" class="form-control form-control-sm" name="pretension" id="pretension">
        	</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="button" class="btn btn-raised btn-primary" id="btnAgrega">INSERTAR</button>
        </div>
      </div>
    </div>
  </div>


  <!--

FORMULARIO PARA ACTUALIZAR DATOS

  -->
  <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Actualizar Persona</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<form id="frmactualiza">
            <input type="text" hidden="" name="id_personau" id="id_personau">
            <label>Nombre</label>
        		<input type="text" class="form-control form-control-sm" name="nombreu" id="nombreu">
        		<label>Apellido</label>
        		<input type="text" class="form-control form-control-sm" name="apellidou" id="apellidou">
        		<label>Fecha Nacimiento</label>
        		<input type="date" class="form-control form-control-sm" name="fechau" id="fechau">
            <label>Correo</label>
        		<input type="email" class="form-control form-control-sm" name="correou" id="correou">
            <label>Direccion</label>
        		<input type="text" class="form-control form-control-sm" name="direccionu" id="direccionu">
            <label>Nacionalidad</label>
        		<input type="text" class="form-control form-control-sm" name="nacionalidadu" id="nacionalidadu">
            <label>Departamento de Nacimiento</label>
        		<input type="text" class="form-control form-control-sm" name="deptonacu" id="deptonacu">
            <label>Celular</label>
        		<input type="text" class="form-control form-control-sm" name="celu" id="celu">
            <label>Profesion</label>
        		<input type="text" class="form-control form-control-sm" name="profesionu" id="profesionu">
            <label>Pretension Salarial</label>
        		<input type="text" class="form-control form-control-sm" name="pretensionu" id="pretensionu">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-raised btn-warning" id="btnactualizar">Actualizar</button>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

		$('#table').load('tabla.php');

    $('#btnAgrega').click(function(){
      if(validarFormVacio('frmAgrega') > 0){
        alertify.alert("INGRESE TODOS LOS CAMPOS");
        return false;
      }

      var v1 = document.getElementById('id_persona').value;
      if ( v1.length < 13) {
        alertify.alert("INGRESE DPI VALIDO");
        return false;
      }

      var vtel = document.getElementById('cel').value;
      if (vtel.length < 8) {
        alertify.alert("INGRESE UN TELEFONO VALIDO");
        return false;
      }

      var vpret = document.getElementById('pretension').value;
      if (isNaN(vpret)) {
        alertify.alert("INGRESE UNA PRET. SALARIAL CORRECTA ");
        return false;
      }
      

      datos=$('#frmAgrega').serialize();


      $.ajax({
        type:"POST",
        data:datos,
        url:"php/insertar.php",
        success:function(r){
          if(r==1){
           $('#frmAgrega')[0].reset();
           $('#table').load('tabla.php');
           alertify.success("INSERTADO CON EXITO");
         }else{
          alertify.error("ERROR AL INSERTAR");
        }
      }
    });
    });


  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnactualizar').click(function(){

      if(validarFormVacio('frmactualiza') > 0){
        alertify.alert("INGRESE TODOS LOS CAMPOS");
        return false;
      }

      var vtel = document.getElementById('celu').value;
      if (vtel.length < 8) {
        alertify.alert("INGRESE UN TELEFONO VALIDO");
        return false;
      }

      var vpret = document.getElementById('pretensionu').value;
      if (isNaN(vpret)) {
        alertify.alert("INGRESE UNA PRET. SALARIAL CORRECTA ");
        return false;
      }

      datos=$('#frmactualiza').serialize();
        $.ajax({
          type:"POST",
          data:datos,
          url:"php/actualizar.php",
          success:function(r){
            if(r==1){
             $('#table').load('tabla.php');
               alertify.success("REGISTRO ACTUALIZADO");
            }else{
               alertify.error("ERROR AL ACTUALIZAR DATOS");
            }
           }
        });
    });
  });
</script>

<script type="text/javascript">

  function obtenDatos(id_p){
    $.ajax({
      type:"POST",
      data:"id_p=" + id_p,
      url:"php/obtenerRegistro.php",
      success:function(r){
        datos=jQuery.parseJSON(r);

        $('#id_personau').val(datos['id_personau']);
        $('#nombreu').val(datos['nombreu']);
        $('#apellidou').val(datos['apellidou']);
        $('#fechau').val(datos['fechau']);
        $('#correou').val(datos['correou']);
        $('#direccionu').val(datos['direccionu']);
        $('#nacionalidadu').val(datos['nacionalidadu']);
        $('#deptonacu').val(datos['deptonacu']);
        $('#celu').val(datos['celu']);
        $('#profesionu').val(datos['profesionu']);
        $('#pretensionu').val(datos['pretensionu']);
      }
    });
  }

  
  function validarFormVacio(formulario){
    datos=$('#' + formulario).serialize();
    d=datos.split('&');
    vacios=0;
    for(i=0;i< d.length;i++){
      controles=d[i].split("=");
      if(controles[1]=="A" || controles[1]==""){
        vacios++;
      }
    }
    return vacios;
  }


  function elimina(id){
      alertify.confirm('Eliminar', '¿SEGURO QUE DESEA ELIMINAR?', 
              function(){ 
                  $.ajax({
                     type:"POST",
                      data:"id=" + id,
                      url:"php/eliminar.php",
                      success:function(r){
                          if(r==1){     
                              $('#table').load('tabla.php');
                              alertify.success("ELIMINADO CORRECTAMENTE");
                          }else{
                               alertify.error("ERROR AL ELIMINAR");
                          }
                      }
                  });
              }
              ,function(){ 
                alertify.error('CANCELAR')
              });
  }

</script>
