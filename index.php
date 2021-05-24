<?php ?>

<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/jquery/jquery-migrate-3.0.0.min.js"></script>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="icon" type="image/png" sizes="16x16" href="./imagenes/web.png">
        <title>API WEB</title>
    </head>
    <body>
        <div class="card">
            <div class="col-sm-12">
                <center> <img src="imagenes/logo.png"></center>
            </div>
            <div class="col-sm-12">
                <a id="nuevo" class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">Nuevo</a>
                <div class="row" style="margin-top: 0px;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="table-responsive m-t-0">
                                    <table  id="tablaBusquedas" name="tablaBusquedas" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%" style="font-size: 14px; text-transform: uppercase;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; background-color: #00264d; color: white;width: 25%;">Nombre</th>
                                                <th style="text-align: center; background-color: #00264d; color: white;width: 25%;">Apellido Paterno</th>
                                                <th style="text-align: center; background-color: #00264d; color: white;width: 25%;">Apellido Materno</th>
                                                <th style="text-align: center; background-color: #00264d; color: white;width: 20%;"></th>
                                            </tr>
                                        <tbody id="clientes"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog mw-100 w-75">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Nuevo Cliente</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="detallesF">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Nombre</label>
                                                            <input class="form-control col-md-8" type="text"  id="nombre">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Apellido Paterno</label>
                                                            <input class="form-control col-md-8" type="text"  id="apellidoP">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Apellido Materno</label>
                                                            <input class="form-control col-md-8" type="text"  id="apellidoM">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">CURP</label>
                                                            <input class="form-control col-md-8" type="text"  id="curp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">RFC</label>
                                                            <input class="form-control col-md-8" type="text"  id="rfc">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Saldo</label>
                                                            <input class="form-control col-md-8" type="text"  id="saldon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Tipo de cuenta</label>
                                                            <select class="form-control col-md-8" id="tipon" ></select>
                                                        </div>
                                                    </div>

                                                </div>



                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-success" id="new" data-dismiss="modal">Guardar</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modals-->  

                            <!--Modals-->  
                            <div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog mw-100 w-75">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Detalles Del Cliente</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="detallesF">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Nombre</label>
                                                            <input class="form-control col-md-8" type="text"  id="nombred" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Apellido Paterno</label>
                                                            <input class="form-control col-md-8" type="text"  id="apellidoPd" disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Apellido Materno</label>
                                                            <input class="form-control col-md-8" type="text"  id="apellidoMd" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Saldo</label>
                                                            <input class="form-control col-md-8" type="text"  id="saldo" disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Contratado</label>
                                                            <input class="form-control col-md-8" type="text"  id="contratado" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Último movimiento</label>
                                                            <input class="form-control col-md-8" type="text"  id="ultimo" disabled="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Tipo de cuenta</label>
                                                            <input class="form-control col-md-8" type="text"  id="tipo" disabled="">
                                                        </div>
                                                    </div>

                                                </div>
                                                <label for="idcd" hidden="">idc:
                                                    <input id="idcd" ></label>


                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Modals-->  
                            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog mw-100 w-75">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Modificar datos del cliente</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="detallesF">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Nombre</label>
                                                            <input class="form-control col-md-8" type="text"  id="nombree" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Apellido Paterno</label>
                                                            <input class="form-control col-md-8" type="text"  id="apellidoPe" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">Apellido Materno</label>
                                                            <input class="form-control col-md-8" type="text"  id="apellidoMe" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">RFC</label>
                                                            <input class="form-control col-md-8" type="text"  id="rfce" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">CURP</label>
                                                            <input class="form-control col-md-8" type="text"  id="curpe" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">SALDO</label>
                                                            <input class="form-control col-md-8" type="text"  id="saldoe" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-3 col-form-label">TIPO DE CUENTA</label>
                                                            <select class="form-control col-md-8" type="text"  id="tipoe" ></select>
                                                        </div>
                                                    </div>
                         
                                                </div>
                                                <label for="idce" hidden="">idc:
                                                    <input id="idce" ></label><br>


                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-success" id="edita" data-dismiss="modal">Guardar</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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

                                            <a class="btn btn-danger" id="elimina" data-dismiss="modal">Eliminar</a>
                                            <a class="btn btn-info" id="cerrarmodal" data-dismiss="modal">Cerrar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="./assets/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="./assets/datatables/dataTables.buttons.min.js"></script>
    <script src="./assets/datatables/buttons.flash.min.js"></script>
    <script src="./assets/datatables/jszip.min.js"></script>
    <script src="./assets/datatables/pdfmake.min.js"></script>
    <script src="./assets/datatables/vfs_fonts.js"></script>
    <script src="./assets/datatables/buttons.html5.min.js"></script>
    <script src="./assets/datatables/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="funciones.js"></script>
    <script>


        </script>
    
</body>

</html>