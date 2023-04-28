<?php

include 'conn/conn.php'

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>CRUD AJAX</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/popper.min.js"></script>
  
</head>

<body>
  <!-- Algoritmos del CRUD -->
  <div class="container fondo">
    <h1 class="text-center">PHP, PDO, Ajax y Datatables.js y Bootstrap 5</h1>
	
	  <br>
	  <div class="row">
		  <div class="col-2 offset-10">
			  <div class="text-center">
				  <!--BOTON QUE DISPARA MODAL-->
				  <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">CREAR</button>
			  </div>
		  </div>
	  </div>
    <br>
    <div class="table-responsive">
      <table id="datos_usuario" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>RUT</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Imagen</th>
            <th>Fecha de Registro</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <!--MODAL, POP UP (VENTANA EMERGENTE) QUE PERMITE HACER ESAS OPERACIONES DESDE UNA UNICA PAGINA PARA QUE SEA MAS INTERACTIVA, NO OLVIDAR MENCIONAR ID CREADA EN EL BOTON-->
  <div class="modal fade" id="modalUsuario" tabindex="-1" aria-modal="true" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creando Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          <form method="POST" id="formulario" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-body">
                <label for="rut">Ingrese RUT</label>
                <input type="text" name="rut" id="rut" class="form-control">
                <br>

                <label for="nombre">Ingrese Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control">
                <br>

                <label for="apellidos">Ingrese los Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control">
                <br>

                <label for="telefono">Ingrese Numero de Telefono</label>
                <input type="number" name="telefono" id="telefono" class="form-control">
                <br>

                <label for="correo">Ingrese Correo</label>
                <input type="email" name="correo" id="correo" class="form-control">
                <br>

                <label for="imagen_usuario">Seleccione una imagen</label>
                <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                <span id="imagen-subida"></span>
                <br>

              </div>

              <div class="modal-footer">

                <input type="hidden" name="id_usuario" id="id_usuario">
              
                <!--ESTE INPUT SE CREA PARA LAS INYECCIONES, PARA PODER SABER CUAL ES LA OPERACION QUE SE VA A REALIZAR (CRUD)-->
                <input type="hidden" name="operacion" id="operacion">

                <!--ESTE INPUT SERA PARA HACER LA FUNCIONALIDAD PARA PROCESAR EL C.R.U.D-->
                <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {

      var dataTable = $('#datos_usuario').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
          url: "mostrar_registros.php",
          type: "POST"
        },
        "columnsDefs": [
          {
          "targets":[0,3,4],
          "orderable":false,
          },
        ]
      });
    });
  </script>
</body>

</html>