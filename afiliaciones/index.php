<?php
session_start();
$_SESSION['lugar']="Afiliaciones";
$nivel=2;
$_SESSION['url']="";
while($nivel>0){
    $_SESSION['url']=$_SESSION['url']."../";
    $nivel--;
}
include_once $_SESSION['url'].'plantilla/usuarioresponsive/superior.php';?>
    <section>
            <header class="major">
                <h2>Afiliaciones</h2>
            </header>
            <div class="features">
                    <article>
                            <!--esta es para imagen en el diamante<span class="icon fa-gem"></span>-->
                            <div class="content">
                                    <p>Coloque el codigo para afiliarse a una empresa</p>
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" id="codigo">
            <button id="btnvalidarcodigo">Validar</button><br>

                            </div>
                    </article>
                    <article>
                            <!--esta es para imagen en el diamante<span class="icon fa-gem"></span>-->
                            <div class="content">
        <div id="mostrarmensajealerta" class="alert"></div>
                            </div>
                    </article>
                <div class="container" id="tabla">
                </div>
</section>
    <!--inicia el modal de nuevo-->
    <!--inicia el modal de nuevo-->
        <!-- Modal -->
 <div class="modal fade" id="modalAgendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<?php include_once $_SESSION['url'].'plantilla/modaltitulo.php';?>
            Agendar Cita
<?php include_once $_SESSION['url'].'plantilla/modalcuerpo.php';?>
            <h2 id="nomemp"></h2>
            <div id="sin" hidden="">
                <h3>Lo sentimos la empresa no a terminado de configurar, pongase en contacto con el dueño para que pueda continuar</h3>
            </div>
            <div id="con" hidden="">
                                    <label for="servicio">Servicio:
                    <select id="servicio" required=""></select></label><br>
                    <label for="selecfecha">Fecha:
                    <select id="selecfecha" required=""></select>
                    <spam id="mensajefecha" class="text-danger"></spam></label><br>
                    
                    <label for="horaactual" hidden="">hora actual en minutos<input type="text" id="horaactual" readonly=""></label>
                    <label for="selechora">Hora:
                    <select id="selechora" required=""></select>
                    <spam id="errorhora"class="text-danger"></spam></label><br>
            </div>
<!--                    <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" value=""><br>
            <label for="hora">Hora:</label>
            <input type="time" id="hora" ><br>-->
<?php include_once $_SESSION['url'].'plantilla/modalbotones.php';?>
<button type="submit" class="btn btn-success" id="agendar" onclick="revisarcitausuario();">Agendar</button>
            <a href="#" class="btn btn-dark" id="cerrarmodal" data-dismiss="modal">Cerrar</a>
<?php include_once $_SESSION['url'].'plantilla/modalfin.php';?>
    <!--terminan los modal-->
    <div id="modalmensajemodificacion" class="modal" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
<?php include $_SESSION['url'].'plantilla/modaltitulo.php';?>
                Alerta
<?php include $_SESSION['url'].'plantilla/modalcuerpo.php';?>
                    <h2 id="mensajemodalalerta"></h2>
<?php include $_SESSION['url'].'plantilla/modalbotones.php';?>
                    <a href="#" class="btn btn-dark" id="cerrarmodal" >Cerrar</a>
<?php include $_SESSION['url'].'plantilla/modalfin.php';?>
    <!--terminan los modal-->
<?php  include $_SESSION['url']."plantilla/usuarioresponsive/inferior.php";?>


<!-------------------------------------plantilla del sistema---------------------------------------------->