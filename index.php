<?php

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>API</title>
  </head>
  <body>
      <header>Caja Valladolid</header>
      <a id="nuevo" class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">Nuevo</a>
      <table>
          <thead>
              <th>Nombre</th>
              <th>Apellido P</th>
              <th>Apellido M</th>
              <th></th>
          </thead>
          <tbody id="clientes"></tbody>
      </table>
    <!--Modals-->  
      <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">

            Nuevo Cliente
        </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form id="nuevoF">
                    <label for="nombre">Nombre:
                    <input id="nombre" ></label><br>
                    
                    <label for="apellidoP">Apellido Paterno:
                    <input id="apellidoP" ></label><br>
                    
                    <label for="apellidoM">Apellido Materno:
                    <input id="apellidoM" ></label><br>
                    
                    <label for="rfc">RFC:
                    <input id="rfc" ></label><br>
                    
                    <label for="curp">Curp:
                    <input id="curp" ></label><br>

                    <label for="saldon" >Saldo:
                    <input id="saldon" ></label><br>
                    
                    <label for="tipon" >Tipo Cuenta:
                    <select id="tipon" ></select></label><br>

                    </form>

      </div>
      <div class="modal-footer">

            <a class="btn btn-success" id="new" data-dismiss="modal">Agregar</a>
            <a class="btn btn-info" id="cerrarmodal" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>
    <!--Modals-->  
      <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">

            Editar Cliente
        </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form id="editarF">
                    <label for="nombree">Nombre:
                    <input id="nombree" ></label><br>
                    
                    <label for="apellidoPe">Apellido Paterno:
                    <input id="apellidoPe" ></label><br>
                    
                    <label for="apellidoMe">Apellido Materno:
                    <input id="apellidoMe" ></label><br>
                    
                    <label for="rfce">RFC:
                    <input id="rfce" ></label><br>
                    
                    <label for="curpe">Curp:
                    <input id="curpe" ></label><br>

                    <label for="idce" hidden="">idc:
                    <input id="idce" ></label><br>

                    </form>

      </div>
      <div class="modal-footer">

            <a class="btn btn-success" id="edita" data-dismiss="modal">Aceptar</a>
            <a class="btn btn-danger" id="cerrarmodal" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
  </div>
</div>
    <!--Modals-->  
      <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">

            Detalles Del Cliente
        </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form id="detallesF">
                    <label for="nombred">Nombre:
                    <input id="nombred" ></label><br>
                    
                    <label for="apellidoPd">Apellido Paterno:
                    <input id="apellidoPd" ></label><br>
                    
                    <label for="apellidoMd">Apellido Materno:
                    <input id="apellidoMd" ></label><br>
                    
                    <label for="saldo">Saldo:
                    <input id="saldo" ></label><br>
                    
                    <label for="contratado">Contratado:
                    <input id="contratado" ></label><br>

                    <label for="ultimo">Ultimo:
                    <input id="ultimo" ></label><br>

                    <label for="tipo">Tipo Cuenta:
                    <input id="tipo" ></label><br>

                    <label for="idcd" hidden="">idc:
                    <input id="idcd" ></label><br>

                    </form>

      </div>
      <div class="modal-footer">

            <a class="btn btn-dark" id="cerrarmodal" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>
    <!--Modals-->  
      <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">

            Eliminar Cliente
        </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>Esta seguro de querer eliminar toda la informacion del cliente</h4>
          <h2 id="clienteEliminar"></h2>
          <input id="idceliminar" type="text" hidden="">

      </div>
      <div class="modal-footer">

            <a class="btn btn-danger" id="cancelar" data-dismiss="modal">Cancelar</a>
            <a class="btn btn-info" id="cerrarmodal" data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="funciones.js"></script>
  </body>
</html>