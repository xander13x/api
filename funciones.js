var postDataJS, idc;
$(document).ready(function (){
    mostrartabla();
});
function mostrartabla(){

    $.ajax({
       url: 'tabla.php',
       type: 'GET',
       success: function (response){
           let objeto = JSON.parse(response);
           let cadena='';
        
           objeto.forEach(elemento=>{
              cadena += `
                        <tr id="${elemento.idC}">
                           <td>${elemento.nombre}</td>
                           <td>${elemento.paterno}</td>
                           <td>${elemento.materno}</td>
                           <td>
                                <a id="editar" class="btn btn-warning" data-toggle="modal" data-target="#modalEditar">Editar</a>
                                <a id="detalles" class="btn btn-primary" data-toggle="modal" data-target="#modalDetalles">Detalles</a>
                                <a id="eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</a>
                            </td>
                        </tr>
                    `;
      });
           $('#clientes').html(cadena);
           
       },complete: function () {
                dTabla("tablaBusquedas");
            }

       
       
    });
    }
    
    function dTabla(table) {
            
            $("#" + table).DataTable();
        
           
    }
    
$('#nuevo').click(function (e){
    e.preventDefault();
        $.ajax({
       url: 'selectTipoCuenta.php',
       type: 'GET',
       success: function (response){
           let objeto = JSON.parse(response);
           let cadena='';
        
           objeto.forEach(elemento=>{
              cadena += `
                        <option value="${elemento.id}">${elemento.nombre}</option>
                    `;
      });
           $('#tipon').html(cadena);
       }
    });
});

$('#new').click(function (){
        postDataJS = {
        nombre: $('#nombre').val(),
        paterno: $('#apellidoP').val(),
        materno: $('#apellidoM').val(),
        rfc: $('#rfc').val(),
        curp: $('#curp').val()

    };
    
    $.ajax({
        async: false,
        url: 'addcliente.php',
        type: 'POST',
        data: postDataJS,
        success: function () {
           
        }
    });
    $.ajax({
        async: false ,
        url: 'nuevocliente.php',
        type: 'POST',
        data: postDataJS,
        success: function (response) {
            let objeto = JSON.parse(response);
           idc = objeto[0].idC;
            
        }
    });
     postDataJS = {
            idCliente: idc,
            idCuenta: $('#tipon').val(),
            saldo: $('#saldon').val()
            }
    $.ajax({
        async: false ,
        url: 'addcuenta.php',
        type: 'POST',
        data: postDataJS,
        success: function () {
           
            mostrartabla();
        }
    });

});


$(document).on('click','#editar',function (e){
    e.preventDefault();
    let id = $($(this)[0].parentElement.parentElement).attr('id');
              
  $.ajax({
         async: false,
        data:{id},
       url: 'datos.php',
       type: 'POST',
       success: function (response){
        let objeto = JSON.parse(response);
        $('#nombree').val(objeto[0].nombre);
        $('#apellidoPe').val(objeto[0].paterno);
        $('#apellidoMe').val(objeto[0].materno);
        $('#rfce').val(objeto[0].rfc);
        $('#curpe').val(objeto[0].curp);
        $('#saldoe').val(objeto[0].saldo);
        $('#movimiento').val(objeto[0].movimiento);
        $('#idce').val(objeto[0].idC);
        let idcuenta = objeto[0].idcuenta;
    $.ajax({
       url: 'selectTipoCuenta.php',
       type: 'GET',
       success: function (response){
           let objeto = JSON.parse(response);
           let cadena='';
           objeto.forEach(elemento=>{
               if (elemento.id==idcuenta)
              cadena += `
                        <option selected value="${elemento.id}">${elemento.nombre}</option>
                    `;
               else
              cadena += `
                        <option value="${elemento.id}">${elemento.nombre}</option>
                    `;
      });
           $('#tipoe').html(cadena);
       }
    });
       }
});
    });
  
$('#edita').click(function (e){
    e.preventDefault();
    postDataJS = {
        nombre: $('#nombree').val(),
        paterno: $('#apellidoPe').val(),
        materno: $('#apellidoMe').val(),
        rfc: $('#rfce').val(),
        curp: $('#curpe').val(),
        idc: $('#idce').val(),
        saldo: $('#saldoe').val(),
        tipo: $('#tipoe').val()
    };
    $.ajax({
        async: false,
        data: postDataJS,
        type: 'POST',
        url: "editarcliente.php",
        success: function () {
           
        }
    });
    $.ajax({
        async: false,
        data: postDataJS,
        type: 'POST',
        url: "editarcuenta.php",
        success: function () {
           
            mostrartabla();
        }
    });

});

    $(document).on('click','#detalles',function (e){
    e.preventDefault();
    let id = $($(this)[0].parentElement.parentElement).attr('id');

    $.post('detalles.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#nombred').val(objeto[0].nombre);
        $('#apellidoPd').val(objeto[0].paterno);
        $('#apellidoMd').val(objeto[0].materno);
        $('#saldo').val(objeto[0].saldo);
        $('#contratado').val(objeto[0].contratado);
        $('#ultimo').val(objeto[0].ultimo);
        $('#tipo').val(objeto[0].tipo);
        $('#idcd').val(objeto[0].idC);
        
});
    });
    
    $(document).on('click','#eliminar',function (e){
    e.preventDefault();
    $('#modalEliminar').fadeIn();
    let id = $($(this)[0].parentElement.parentElement).attr('id');
    $('#mensajeeliminar').html("Esta seguro de querer cancelar la tarea</br>Folio:"+id);
    $('#can').val(id);
    
              $.post('datos.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#clienteEliminar').html(objeto[0].nombre);
        $('#idceliminar').val(objeto[0].idC);
});
    
    });
    
    $('#elimina').click(function (e){
    e.preventDefault();
    postDataJS = {
        idc: $('#idceliminar').val()
    };
    $.ajax({
        async: false,
        data: postDataJS,
        type: 'POST',
        url: "eliminarcuenta.php",
        success: function () {
           
        }
    });
    $.ajax({
        async: false,
        data: postDataJS,
        type: 'POST',
        url: "eliminarcliente.php",
        success: function () {
           
            mostrartabla();
        }
    });
 

});
    
