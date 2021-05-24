var empresa,mensaje,vmen=0,cod,mensajecod,ide,tiemporespuesta=300;
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var diasmes = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var f="";
        var idservicio;
$(document).ready(function (){
    setTimeout('mostrartabla()',tiemporespuesta);
    fechaactual();
    ayer();
    hoy();
    mañana();
    $('#titulofecha').html("Citas del dia "+fechatexto(eshoy));
    mostrarinfo();
     $("#servicio").change(function(){
                           if ($('#selecfecha').val()==0)
                  $('#selechora').html("<option value='0'>Seleccione el dia en la parte anterior</option>");
                  else    
                  {

        fechasel = $("#selecfecha").val();
         console.log("eshoy");
         console.log(eshoy);
         console.log("fechasel");
         console.log(fechasel);
         
        dianumero = numerodedia(fechasel);
        console.log("dianumero");
        console.log(dianumero);
        console.log("fechasel");
        console.log(fechasel);
        
        if(dianumero==0){
            entrada = parseInt(he7.substring(0,2))*60+parseInt(he7.substring(3,5));
            if(hc1==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc7.substring(0,2))*60+parseInt(hc7.substring(3,5));
            regreso = parseInt(hr7.substring(0,2))*60+parseInt(hr7.substring(3,5));
            }
            salida = parseInt(hs7.substring(0,2))*60+parseInt(hs7.substring(3,5));
        }
        if(dianumero==1){
            entrada = parseInt(he1.substring(0,2))*60+parseInt(he1.substring(3,5));
            if(hc1==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc1.substring(0,2))*60+parseInt(hc1.substring(3,5));
            regreso = parseInt(hr1.substring(0,2))*60+parseInt(hr1.substring(3,5));
            }
            salida = parseInt(hs1.substring(0,2))*60+parseInt(hs1.substring(3,5));
        }
        if(dianumero==2){
            entrada = parseInt(he2.substring(0,2))*60+parseInt(he2.substring(3,5));
            if(hc2==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc2.substring(0,2))*60+parseInt(hc2.substring(3,5));
            regreso = parseInt(hr2.substring(0,2))*60+parseInt(hr2.substring(3,5));
            }
            salida = parseInt(hs2.substring(0,2))*60+parseInt(hs2.substring(3,5));
        }
        if(dianumero==3){
            entrada = parseInt(he3.substring(0,2))*60+parseInt(he3.substring(3,5));
            if(hc3==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc3.substring(0,2))*60+parseInt(hc3.substring(3,5));
            regreso = parseInt(hr3.substring(0,2))*60+parseInt(hr3.substring(3,5));
            }
            salida = parseInt(hs3.substring(0,2))*60+parseInt(hs3.substring(3,5));
        }
        if(dianumero==4){
            entrada = parseInt(he4.substring(0,2))*60+parseInt(he4.substring(3,5));
            if(hc4==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc4.substring(0,2))*60+parseInt(hc4.substring(3,5));
            regreso = parseInt(hr4.substring(0,2))*60+parseInt(hr4.substring(3,5));
            }
            salida = parseInt(hs4.substring(0,2))*60+parseInt(hs4.substring(3,5));
        }
        if(dianumero==5){
            entrada = parseInt(he5.substring(0,2))*60+parseInt(he5.substring(3,5));
            if(hc5==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc5.substring(0,2))*60+parseInt(hc5.substring(3,5));
            regreso = parseInt(hr5.substring(0,2))*60+parseInt(hr5.substring(3,5));
            }
            salida = parseInt(hs5.substring(0,2))*60+parseInt(hs5.substring(3,5));
        }
        if(dianumero==6){
            entrada = parseInt(he6.substring(0,2))*60+parseInt(he6.substring(3,5));
            if(hc6==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc6.substring(0,2))*60+parseInt(hc6.substring(3,5));
            regreso = parseInt(hr6.substring(0,2))*60+parseInt(hr6.substring(3,5));
            }
            salida = parseInt(hs6.substring(0,2))*60+parseInt(hs6.substring(3,5));
        }
         
         if (fechasel!=eshoy){
              cadena = '';

        horaactual=0;
                 let idservicio=$('#servicio').val();
            $.post('duracionminima.php',{id:idservicio,ide:ide}, function(response) {
                let objeto = JSON.parse(response);
                    restar=objeto[0].durasion;
                    console.log(restar);
        
        console.log("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar);
        $('#horaactual').val("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar);
        
       const postDataJS = {
      entrada : entrada,
      horaactual : horaactual,
      comida : comida,
      regreso : regreso,
      salida : salida,
      hoy: fechasel,
      restar: parseInt(restar)
    };
                    console.log(postDataJS);
                    verhorarioocupadoantesdecita(postDataJS);
                    $('#selechora').html(selecthora(postDataJS));
                });

          } else {
             

        f=new Date();
        let horaactual=f.getHours()*60+f.getMinutes();
        
                 let idservicio=$('#servicio').val();
            $.post('duracionminima.php',{id:idservicio, ide:ide}, function(response) {
                let objeto = JSON.parse(response);
                    restar=objeto[0].durasion;
        
        console.log("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar);
        $('#horaactual').val("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar);
        
       const postDataJS = {
      entrada : entrada,
      horaactual : horaactual,
      comida : comida,
      regreso : regreso,
      salida : salida,
      hoy: eshoy,
      restar: parseInt(restar)
    };
                     console.log(postDataJS);
                    verhorarioocupado(postDataJS);
                    $('#selechora').html(selecthora(postDataJS));
                });


                      }
                  }
        });
     
      $("#selecfecha").change(function(){
                           if ($('#selecfecha').val()==0)
                  $('#selechora').html("<option value='0'>Seleccione el dia en la parte anterior</option>");
                  else    
                  {
        fechasel = $("#selecfecha").val();
         console.log("eshoy");
         console.log(eshoy);
         console.log("fechasel");
         console.log(fechasel);
         
        dianumero = numerodedia(fechasel);
        console.log("dianumero");
        console.log(dianumero);
        console.log("fechasel");
        console.log(fechasel);
        
        if(dianumero==0){
            entrada = parseInt(he7.substring(0,2))*60+parseInt(he7.substring(3,5));
            if(hc1==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc7.substring(0,2))*60+parseInt(hc7.substring(3,5));
            regreso = parseInt(hr7.substring(0,2))*60+parseInt(hr7.substring(3,5));
            }
            salida = parseInt(hs7.substring(0,2))*60+parseInt(hs7.substring(3,5));
        }
        if(dianumero==1){
            entrada = parseInt(he1.substring(0,2))*60+parseInt(he1.substring(3,5));
            if(hc1==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc1.substring(0,2))*60+parseInt(hc1.substring(3,5));
            regreso = parseInt(hr1.substring(0,2))*60+parseInt(hr1.substring(3,5));
            }
            salida = parseInt(hs1.substring(0,2))*60+parseInt(hs1.substring(3,5));
        }
        if(dianumero==2){
            entrada = parseInt(he2.substring(0,2))*60+parseInt(he2.substring(3,5));
            if(hc2==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc2.substring(0,2))*60+parseInt(hc2.substring(3,5));
            regreso = parseInt(hr2.substring(0,2))*60+parseInt(hr2.substring(3,5));
            }
            salida = parseInt(hs2.substring(0,2))*60+parseInt(hs2.substring(3,5));
        }
        if(dianumero==3){
            entrada = parseInt(he3.substring(0,2))*60+parseInt(he3.substring(3,5));
            if(hc3==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc3.substring(0,2))*60+parseInt(hc3.substring(3,5));
            regreso = parseInt(hr3.substring(0,2))*60+parseInt(hr3.substring(3,5));
            }
            salida = parseInt(hs3.substring(0,2))*60+parseInt(hs3.substring(3,5));
        }
        if(dianumero==4){
            entrada = parseInt(he4.substring(0,2))*60+parseInt(he4.substring(3,5));
            if(hc4==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc4.substring(0,2))*60+parseInt(hc4.substring(3,5));
            regreso = parseInt(hr4.substring(0,2))*60+parseInt(hr4.substring(3,5));
            }
            salida = parseInt(hs4.substring(0,2))*60+parseInt(hs4.substring(3,5));
        }
        if(dianumero==5){
            entrada = parseInt(he5.substring(0,2))*60+parseInt(he5.substring(3,5));
            if(hc5==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc5.substring(0,2))*60+parseInt(hc5.substring(3,5));
            regreso = parseInt(hr5.substring(0,2))*60+parseInt(hr5.substring(3,5));
            }
            salida = parseInt(hs5.substring(0,2))*60+parseInt(hs5.substring(3,5));
        }
        if(dianumero==6){
            entrada = parseInt(he6.substring(0,2))*60+parseInt(he6.substring(3,5));
            if(hc6==""){
            comida = 0;
            regreso = 0;
            } else {
            comida = parseInt(hc6.substring(0,2))*60+parseInt(hc6.substring(3,5));
            regreso = parseInt(hr6.substring(0,2))*60+parseInt(hr6.substring(3,5));
            }
            salida = parseInt(hs6.substring(0,2))*60+parseInt(hs6.substring(3,5));
        }
         
         if (fechasel!=eshoy){
              cadena = '';
        
        let horaactual=0;
        
                 idservicio=$('#servicio').val();

                 durasiondelservicio(ide,idservicio);
        console.log("fecha diferente Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar+" comida "+comida+" regreso "+regreso);
        $('#horaactual').val("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar);
        
       const postDataJS = {
      entrada : entrada,
      horaactual : horaactual,
      comida : comida,
      regreso : regreso,
      salida : salida,
      hoy: fechasel,
      restar: parseInt(restar)
    };

                    console.log(postDataJS);
                    verhorarioocupado(postDataJS);
                    $('#selechora').html(selecthora(postDataJS));

          } else {
             
        f=new Date();
        let horaactual=f.getHours()*60+f.getMinutes();
        
                 let idservicio=$('#servicio').val();
            $.post('duracionminima.php',{id:idservicio,ide:ide}, function(response) {
                let objeto = JSON.parse(response);
                    restar=objeto[0].durasion;
        
        console.log("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar+" comida "+comida+" regreso "+regreso);
        $('#horaactual').val("Entrada="+entrada+" Hora="+horaactual+" Salida="+salida+" restar "+restar+" comida "+comida+" regreso "+regreso);
        
       const postDataJS = {
      entrada : entrada,
      horaactual : horaactual,
      comida : comida,
      regreso : regreso,
      salida : salida,
      hoy: eshoy,
      restar: parseInt(restar)
    };
                    console.log(postDataJS);
                    verhorarioocupado(postDataJS);
                    $('#selechora').html(selecthora(postDataJS));
            });
                      }}



      });
});
////mostrar la informacion de las tablas
function mostrartabla(){
    
    $.ajax({
       url: 'tablaafiliado.php',
       type: 'GET',
       success: function (response){
           let objeto = JSON.parse(response);
           let cadena = '';

      objeto.forEach(elemento=>{
            cadena += `
            <hr>
                    <div class="row">
                        <div class="col-12">
                            <strong>Numero:</strong> ${elemento.ide}
                        </div>
                    </div>
                    <div class="row" id="${elemento.ide}">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <strong>Nombre:</strong> ${elemento.empresa}
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <strong>Codigo:</strong> ${elemento.codigo}
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <strong>Afiliado:</strong> ${elemento.fecha}
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <button id="btnagendar"  data-toggle="modal" data-target="#modalAgendar">agendar</button>
                        </div>
                    </div>     
                    `;
      });
           $('#tabla').html(cadena);
       }
    });
}
//boton para validar el codigo del campo y decir si esta afiliado si se registro correctamente o si esta mal
    $('#btnvalidarcodigo').click(function (e) {
        if($('#codigo').val()===""){
            $('#mostrarmensajealerta').removeClass("alert-primary");
            $('#mostrarmensajealerta').addClass("alert-danger");
            let div = `<h5 id="mensaje">Ingrese el codigo</h5>`;
            $('#mostrarmensajealerta').html(div);
        }
        else{
            let postDataJS = {
            codigo: $('#codigo').val()
        };
            $.ajax({
            url: 'revcodigo.php',
            type: 'POST',
            data: postDataJS,
            success: function (response) {
                objeto = JSON.parse(response);
                if(objeto[0])
                if(objeto[0].rep!=0){
                mensajecod="correcto";
                ide=objeto[0].id;
            }else{
                mensajecod="incorrecto";
            }
            setTimeout('mandaalerta()',tiemporespuesta);
            }
    });
            }
});
    
    function mandaalerta(){
        var div;
        
        if(mensajecod==="correcto"){
            $.post('verafiliado.php',{ide},function (response) {
                objeto = JSON.parse(response);
                if(objeto[0].rep==0){
            $('#mostrarmensajealerta').removeClass("alert-danger");
            $('#mostrarmensajealerta').removeClass("alert-warning");
            $('#mostrarmensajealerta').addClass("alert-primary");
               div = `<h5 id="mensaje">Se a Afiliado Correctamente</h5>`;
            $.post('afiliar.php',{ide},function (response) {
                });
            }else{
            $('#mostrarmensajealerta').removeClass("alert-primary");
            $('#mostrarmensajealerta').removeClass("alert-danger");
            $('#mostrarmensajealerta').addClass("alert-warning");
               div = `<h5 id="mensaje">Usted ya se encuentra Afiliado</h5>`;
            }
                    $('#mostrarmensajealerta').html(div);

        });
        }else{
            $('#mostrarmensajealerta').removeClass("alert-primary");
            $('#mostrarmensajealerta').addClass("alert-danger");
            div = `<h5 id="mensaje">codigo  incorrecto, favor de verificar</h5>`;
        }
        
        $('#mostrarmensajealerta').html(div);
        setTimeout('mostrartabla()',tiemporespuesta);


    }

//boton para agendar en una empresa afiliada
$(document).on('click','#btnagendar',function (e){
    ide = $($(this)[0].parentElement.parentElement).attr('id');
    e.preventDefault();
//alert(ide);
let servicios;
    $.ajax({
        async: false,
        url: 'cuentaservicios.php',
        type: 'POST',
        data: {ide},
        success: function (response){
            let objeto = JSON.parse(response);
            servicios = objeto[0].servicios;
            console.log(servicios);
   if(servicios>0){
       $('#con').removeAttr("hidden");
       $('#sin').prop("hidden"," ");
       $('#agendar').removeAttr("hidden");
   }
   else{
       $('#sin').removeAttr("hidden");
       $('#agendar').prop("hidden"," ");
       $('#con').prop("hidden"," ");
   }
   
       }
   });
        $('#servicio').html(llenarselectservicioajedar(ide));
        
        horariodelaempresaajendar(ide);
        $('#nomemp').html(nombreempresa);

        $('#selecfecha').html(llenarselectfecha());
        $('#selechora').html("<option value='0'>Seleccione el dia en la parte superior</option>");
        setTimeout(mostrarmodal(),tiemporespuesta);
    });
            function mostrarmodal() {
    $('#modalAgendar').fadeIn();
}
function revisarcitausuario() {
    setTimeout('agregarcitausuario()',500);
}
function agregarcitausuario() {
        error = false;
        $('#errorhora').html("");

        if ($('#selecfecha').val()==0){
            $('#mensajefecha').html("Falta seleccionar la fecha para su cita");
            error = true;
        
        } else{
            $('#mensajefecha').html("");
        }
        fechasel=$('#selecfecha').val();
        if (fechasel==eshoy)
        horaactualya();
        else
            eslahoraenminutos=0;
        const postDataJS = {
              horaactual : eslahoraenminutos,
              hoy: $('#selecfecha').val()
        };
        console.log("postDataJS para horario ocupado");
        console.log(postDataJS);
        verhorarioocupadoantesdecita(postDataJS);
        console.log("ocupadoinicio");
        console.log(ocupadoinicio);
        console.log("ocupadofin");
        console.log(ocupadofin);
        if ($('#selechora').val() === "0"){
            error = true;
            $('#errorhora').html("Falta elegir la hora para su cita");
        } else{
            $('#errorhora').html("");
                horacita = $('#selechora').val();
        }
       
        if (ocupadoinicio.length>0){
            for(let i=0;i<ocupadoinicio.length;i++){
            if(horacita>=ocupadoinicio[i]&&horacita<ocupadofin[i]){
                error=true;
            $('#errorhora').html("Lo sentimos esa hora ya a sido ocupada por alguien");

        console.log("Entrada="+entrada+" Hora="+eslahoraenminutos+" Salida="+salida+" restar "+restar);
        $('#horaactual').val("Entrada="+entrada+" Hora="+eslahoraenminutos+" Salida="+salida+" restar "+restar);
        
       const postDataJS = {
      entrada : entrada,
      horaactual : eslahoraenminutos,
      comida : comida,
      regreso : regreso,
      salida : salida,
      hoy: eshoy,
      restar: parseInt(restar)
    };
                    $('#selechora').html(selecthora(postDataJS));

            }
            }
        }
        console.log(error);
        if (error==false){
            horacita = $('#selechora').val();
            tiempofinal=parseInt($('#selechora').val())+parseInt(restar);
            hora = obtenerhoradesdeminutos(horacita);
            horafin = obtenerhoradesdeminutos(tiempofinal);
            
            const postDataJS = {
              servicio : $('#servicio').val(),
              fecha : $('#selecfecha').val(),
              inicio : $('#selechora').val(),
              fin : tiempofinal,
              hora : hora,
              horafin : horafin
            };
                    console.log(postDataJS);

        $.post('agendar.php',postDataJS, function (response) {
            console.log(response);
            mensaje="Su cita a sido agregada correctamente checar";
        mensajedealerta("Cita agregada correctamente Desde el metodo externo");
           });
            
        } else
            $('#modalAgendar').fadeIn(); 
        
};
//TERMINA MODIFICAR
$(document).on('click','#cerrarmodal', function (e){
    e.preventDefault();
     closeModal();
        });
    

    function obtenerhoradesdeminutos(valor) {
    $.ajax({
        async: false,
        url: 'obtenerhora.php',
        data: {buscar: valor},
        type: 'POST',
        success: function (response) {
            let objeto = JSON.parse(response);
            valorhora = objeto[0].valor;
        }
    });
    return valorhora;
}

