<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('idRol');
if ($sId === '2') { ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {

  $userAdd = $users->addNewUserByAdmin($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}


 ?>


 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Agregar nuevo usuario</h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                  <label for="name">Nombres</label>
                  <input type="text" name="name"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="lastName">Apellidos</label>
                  <input type="text" name="lastName"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="idTdoc">Seleccione tipo de docuemtno</label>
                    <select class="form-control" name="idTdoc">
                      <option value="0">Cédula de ciudadania</option>
                      <option value="1">Tarjeta de identidad</option>
                      <option value="2">Cédula de extranjeria</option>
                      <option value="3">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="numberDoc">Numero de documento</label>
                  <input type="text" name="numberDoc"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="mobile">Número de teléfono móvil</label>
                  <input type="text" name="mobile"  class="form-control">
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
                    <div id="select2lista"></div>
                <div class="form-group">
                  <label for="email">Direccion de Correo electronico</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="idRol">Seleccionar rol de usuario</label>
                    <select class="form-control" name="idRol">
                      <option value="0">Administrador</option>
                      <option value="1">Representante legal</option>
                      <option value="2">Postulante</option>

                    </select>
                  </div>
                </div>
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
