
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
                                <a id="editar" class="btn btn-info">Editar</a>
                                <a id="detalles" class="btn btn-info">Detalles</a>
                                <a id="eliminar" class="btn btn-danger">Eliminar</a>
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
    console.log("diste nuevo");
    $('#modalNuevo').fadeIn();
});


$(document).on('click','#editar',function (e){
    e.preventDefault();
    $('#modalEditar').fadeIn();
    let id = $($(this)[0].parentElement.parentElement).attr('id');
  
    $('#mensajeeliminar').html("Esta seguro de querer cancelar la tarea</br>Folio:"+id);
    $('#can').val(id);
    $.post('editar.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#tareae').val(objeto[0].tarea);
        $('#fechae').val(objeto[0].fecha);
        $('#horae').val(objeto[0].hora);
});
    });
    
    $(document).on('click','#detalles',function (e){
    e.preventDefault();
    $('#modalDetalles').fadeIn();
    let id = $($(this)[0].parentElement.parentElement).attr('id');
  
    $('#mensajeeliminar').html("Esta seguro de querer cancelar la tarea</br>Folio:"+id);
    $('#can').val(id);
    $.post('detalles.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#tareae').val(objeto[0].tarea);
        $('#fechae').val(objeto[0].fecha);
        $('#horae').val(objeto[0].hora);
});
    });
    
    $(document).on('click','#eliminar',function (e){
    e.preventDefault();
    $('#modalEliminar').fadeIn();
    let id = $($(this)[0].parentElement.parentElement).attr('id');
    console.log(id);
    $('#mensajeeliminar').html("Esta seguro de querer cancelar la tarea</br>Folio:"+id);
    $('#can').val(id);
    $.post('eliminar.php',{id},function (response) {
        let objeto = JSON.parse(response);
        $('#tareae').val(objeto[0].tarea);
        $('#fechae').val(objeto[0].fecha);
        $('#horae').val(objeto[0].hora);
});
    });