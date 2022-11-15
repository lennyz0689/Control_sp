<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('idRol');
if ($sId === '2') { ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {

  $userAdd = $users->addNewCompanyByAdmin($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}


 ?>


 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Agregar Nueva Empresa</h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                  <label for="nit">N.I.T</label>
                  <input type="text" name="nit"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="razSocial">Razon Social</label>
                  <input type="text" name="razSocial"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="actEconomica">Seleccione tipo de actividad Economica</label>
                    <select class="form-control" name="actEconomica">
                      <option value="0"></option>
                      <option value="ATIVIDADES ARTISTICAS, DE ENTRETENIMIENTO Y RECREACION">ATIVIDADES ARTISTICAS, DE ENTRETENIMIENTO Y RECREACION</option>
                      <option value="ACTIVIDADES DE ATENCION DE LA SALUD HUMANA Y DE ASISTENCIA SOCIAL">ACTIVIDADES DE ATENCION DE LA SALUD HUMANA Y DE ASISTENCIA SOCIAL</option>
                      <option value="ACTIVIDADES DE LOS HOGARES INDIVIDUALES EN CALIDAD DE EMPLEADORES; ACTIVIDADES DIFERENCIADAS DE LOS HOGARES INDIVIDUALES COMO PRODUCTORES">ACTIVIDADES DE LOS HOGARES INDIVIDUALES EN CALIDAD DE EMPLEADORES; ACTIVIDADES DIFERENCIADAS DE LOS HOGARES INDIVIDUALES COMO PRODUCTORES </option>
                      <option value="ACTIVIDADES DE ORGANIZACION Y ENTIDADES EXTRATERRITORIALES">ACTIVIDADES DE ORGANIZACION Y ENTIDADES EXTRATERRITORIALES</option>
                      <option value="ACTIVIDESDES DE SERVICIOS ADMINISTRATIVOS Y DE APOYO">ACTIVIDESDES DE SERVICIOS ADMINISTRATIVOS Y DE APOYO</option>
                      <option value="ACTIVIDADES FINANCIERAS DE SEGUROS">ACTIVIDADES FINANCIERAS DE SEGUROS</option>
                      <option value="ACTIVIDADES INMOBILIARIAS">ACTIVIDADES INMOBILIARIAS</option>
                      <option value="ACTIVIDADES NO DEFINIDAS">ACTIVIDADES NO DEFINIDAS</option>
                      <option value="ACTIVIDADES PROFESIONALES, CIENTIFICAS Y TECNICAS">ACTIVIDADES PROFESIONALES, CIENTIFICAS Y TECNICAS</option>
                      <option value="ADMINISTRACION PUBLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACION OBLIGATORIA">ADMINISTRACION PUBLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACION OBLIGATORIA</option>
                      <option value="AGRICULTURA, GANADERIA, CAZA, SILVICULTURA Y PESCA">AGRICULTURA, GANADERIA, CAZA, SILVICULTURA Y PESCA</option>
                      <option value="ALOJAMIENTO Y SERVICIOS DE COMIDA">ALOJAMIENTO Y SERVICIOS DE COMIDA</option>
                      <option value="COMERCIO AL POR MAYOR Y AL POR MENOR">COMERCIO AL POR MAYOR Y AL POR MENOR</option>
                      <option value="CONSTRUCCION">CONTRUCCION</option>
                      <option value="DISTRIBUCION DE AGUA; EVACUACION Y TRATAMIENTO DE AGUA RESIDUALES, GESTION DE DESECHOS Y ACTIVIDADES DE SANEAMIENTO AMBIENTAL">DISTRIBUCION DE AGUA; EVACUACION Y TRATAMIENTO DE AGUA RESIDUALES, GESTION DE DESECHOS Y ACTIVIDADES DE SANEAMIENTO AMBIENTAL</option>
                      <option value="EDUCACION">EDUCACION</option>
                      <option value="EXPLOTACION DE MINAS Y CANTERAS">EXPLOTACION DE MINAS Y CANTERAS</option>
                      <option value="INDUSTRIAS MANUFACTURERAS">INDUSTRIAS MANUFACTURERAS</option>
                      <option value="INFORMACION Y COMUNICACIONES">INFORMACION Y COMUNICACIONES</option>
                      <option value="OTRAS ACTIVIDADES DE SERVICIOS">OTRAS ACTIVIDADES DE SERVICIOS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Departamento">Departamento</label>
                    <select id="lista1" name="lista1" class="form-control">
		              	<option value="0">Selecciona una opcion</option>
			              <option value="1">Amazonas</option>
                    <option value="2">Antoquia</option>
                    <option value="3">Arauca</option>
                    <option value="4">Atlantico</option>
                    <option value="5">Bogota</option>
                    <option value="6">Bolivar</option>
                    <option value="7">Boyaca</option>
                    <option value="8">Caldas</option>
                    <option value="9">Caqueta</option>
                    <option value="10">Casanare</option>
                    <option value="11">Cauca</option>
                    <option value="12">Cesar</option>
                    <option value="13">Choco</option>
                    <option value="14">Cordoba</option>
                    <option value="15">Cundinamarca</option>
                    <option value="16">Guainia</option>
                    <option value="17">Guaviare</option>
                    <option value="18">Huila</option>
                    <option value="19">La Guajira</option>
                    <option value="20">Magdalena</option>
                    <option value="21">Meta</option>
                    <option value="22">Nariño</option>
                    <option value="23">Norte De Santander</option>
                    <option value="24">Putumayo</option>
                    <option value="25">Quindio</option>
                    <option value="26">Risaralda</option>
                    <option value="27">San Andres Y Providencia</option>
                    <option value="28">Santander</option>
                    <option value="29">Sucre</option>
                    <option value="30">Tolima</option>
                    <option value="31">Valle Del Cauca</option>
                    <option value="32">Vaupes</option>
                    <option value="33">Vichada</option>
			              </select>
                </div>
                    <div id="select2lista"></div><br>
                <div class="form-group">
                  <button type="submit" name="addUser" class="btn btn-success">Registrar</button>
                </div>

            </form>
          </div>

        </div>
      </div>

<?php
}else{

  header('Location:index.php');



}
 ?>

<?php
  include 'inc/footer.php';

  ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#lista1').val(0);
    recargarLista();

    $('#lista1').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"datos.php",
      data:"Departamento=" + $('#lista1').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>

        </div>
      </div>



  <?php
  include 'inc/footer.php';

  ?>