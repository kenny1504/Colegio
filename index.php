<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Resource/CSS/index.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div id="London" class="tabcontent">
  <h1>Lorem Ipsum</h1>
</div>

<button class="tablink" onclick="" id="defaultOpen">********</button>
<button class="tablink" onclick="">********</button>
<button class="tablink" onclick="Materias()">Asignaturas</button>
<button class="tablink" onclick="Grados()">Grados</button>
<button class="tablink" onclick="Consulta()">Consulta</button>
<button class="tablink" onclick="">********</button>
<button class="tablink" onclick="">********</button>
<div class="box">
    <div class="box-header">
       <div aria-required="true" class="form-group has-feedback">
                  <select required style="width: 20%;padding-top: 1%; margin-left: 70%;" id="Grados">
                    <option value="" disabled selected>Grados</option>
                  </select>
                  <a id="Buscar1" style="margin-block-end: 1.5%;" onclick="Buscar()" class="text-white  btn btn-primary btn-sm pull-right" >Buscar</a>
			 </div>
       <div class="pull-right box-tools">
          <a id="M1" data-toggle="modal" data-target="#CrearMateria"  class="text-white  btn btn-primary btn-sm pull-right" >Agregar Materia</a>        
       </div>
       <div class="pull-right box-tools">
       <a id="M2" data-toggle="modal" data-target="#CrearGrado"  class="text-white  btn btn-primary btn-sm pull-right" >Agregar Grado</a> 
       </div> 
    </div>  
</div>     
</div>
<table id="Datos" style="text-align-last:center;">
</table > 
<!--Modales-->
<form onsubmit="event.preventDefault()">
    <div class="modal fade" id="CrearMateria" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Materia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
                  <div class="form-group has-feedback">
                                <input type="text" name="Nombre Asignatura" id="Materia-Nueva" class="form-control requerido" required placeholder="Nombre Asignatura" >
                  </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" onclick="ingresarMateria ()"  class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
</form>

<form onsubmit="event.preventDefault()">
    <div class="modal fade" id="CrearGrado" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Grado Academico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
                  <div class="form-group has-feedback">
                                <input type="text" id="Grado-Nuevo" class="form-control requerido" required placeholder="Grado Academico" >
                  </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" onclick=""  class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
</form>

<form onsubmit="event.preventDefault()">
    <div class="modal fade" id="ActualizarMateria" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Actualizar Materia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
                  <div class="form-group has-feedback">
                                <input type="text" id="Materia-Actualizar" class="form-control requerido" required placeholder="Grado Academico" >
                  </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" onclick="UpdateMateria()"  class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
</form>

<form onsubmit="event.preventDefault()">
    <div class="modal fade" id="EliminarMateria" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h1>Eliminar Materia</h1>
           <p>Confirme que desea eliminar esta materia?</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" onclick="ConfirmarMateria()"  class="btn btn-danger">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
</form>


<form onsubmit="event.preventDefault()">
    <div class="modal fade" id="AsignarMateria" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Asignar Materia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
               <div aria-required="true" class="form-group has-feedback">
                  <select required style="width: 100%; padding-top: 2.5%; " id="Grados2">
                    <option value="" disabled selected>Grados</option>
                  </select>
						   </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" onclick="ConfirmarAsignar()"  class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
</form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="Resource/JS/Datos.js"></script>
</html> 