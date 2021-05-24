var postDataJS;
$(document).ready(function (){
    console.log("funciones");
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
                                <a id="editar" class="btn btn-info" data-toggle="modal" data-target="#modalEditar">Editar</a>
                                <a id="detalles" class="btn btn-info" data-toggle="modal" data-target="#modalDetalles">Detalles</a>
                                <a id="eliminar" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</a>
                            </td>
                        </tr>
                    `;
      });
           $('#clientes').html(cadena);
       }
    });
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
        curp: $('#curp').val(),
        saldo: $('#saldon').val()
    };
    console.log(postDataJS);
    
    $.ajax({
        async: false,
        url: 'addcliente.php',
        type: 'POST',
        data: postDataJS,
        success: function (response) {
            console.log(response);
    $.ajax({
        async: false ,
        url: 'nuevocliente.php',
        type: 'POST',
        data: postDataJS,
        success: function (response) {
            let objeto = JSON.parse(response)
            postDataJS = {
            idCliente: objeto[0].idC,
            idCuenta: $('#tipon').val()
            }
            
    $.ajax({
        async: false ,
        url: 'addcuenta.php',
        type: 'POST',
        data: postDataJS,
        success: function (response) {
            console.log(response);
            mostrartabla();
        }
    });
        }
    });
        }
    });
    
});


$(document).on('click','#editar',function (e){
    e.preventDefault();
    let id = $($(this)[0].parentElement.parentElement).attr('id');
          $.post('datos.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#nombree').val(objeto[0].nombre);
        $('#apellidoPe').val(objeto[0].paterno);
        $('#apellidoMe').val(objeto[0].materno);
        $('#rfce').val(objeto[0].rfc);
        $('#curpe').val(objeto[0].curp);
        $('#idce').val(objeto[0].idC);
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
        idc: $('#idce').val()
    };
    console.log(postDataJS);
    $.ajax({
        async: false,
        data: postDataJS,
        type: 'POST',
        url: "editar.php",
        success: function (response) {
            console.log(response);
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
    console.log(id);
    $('#mensajeeliminar').html("Esta seguro de querer cancelar la tarea</br>Folio:"+id);
    $('#can').val(id);
    
              $.post('datos.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#clienteEliminar').html(objeto[0].nombre);
        $('#idceliminar').val(objeto[0].idC);
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
        idc: $('#idceliminar').val()
    };
    console.log(postDataJS);
    $.ajax({
        async: false,
        data: postDataJS,
        type: 'POST',
        url: "eliminar.php",
        success: function (response) {
            console.log(response);
            mostrartabla();
        }
    });
 

});
    
