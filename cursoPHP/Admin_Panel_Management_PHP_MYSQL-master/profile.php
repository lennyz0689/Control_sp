<?php
include 'inc/header.php';
Session::CheckSession();

 ?>

<?php

if (isset($_GET['id'])) {
  $id = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $updateUser = $users->updateUserByIdInfo($id, $_POST);

}
if (isset($updateUser)) {
  echo $updateUser;
}




 ?>

 <div class="card ">
   <div class="card-header">
          <h3>Perfil del usuario <span class="float-right"> <a href="index.php" class="btn btn-primary">Volver </a> </h3>
        </div>
        <div class="card-body">

    <?php
    $getUinfo = $users->getUserInfoById($id);
    if ($getUinfo) {






     ?>


          <div style="width:600px; margin:0px auto">

          <form class="" action="" method="POST">
              <div class="form-group">
                <label for="name">Tu nombre</label>
                <input type="text" name="name" value="<?php echo $getUinfo->name; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="lastName">Tus Apellidos</label>
                <input type="text" name="lastName" value="<?php echo $getUinfo->lastName; ?>" class="form-control">
              </div>
              <div class="form-group">
                    <label for="idTdoc">Seleccione tipo de docuemtno</label>
                    <select class="form-control" name="idTdoc">
                      <option value="<?php echo $getUinfo->idTdoc; ?>">Cédula de ciudadania</option>
                      <option value="<?php echo $getUinfo->idTdoc; ?>">Tarjeta de identidad</option>
                      <option value="<?php echo $getUinfo->idTdoc; ?>">Cédula de extranjeria</option>
                      <option value="<?php echo $getUinfo->idTdoc; ?>">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="numberDoc">Numero de documento</label>
                  <input type="text" name="numberDoc" value="<?php echo $getUinfo->numberDoc; ?>"  class="form-control">
                </div>
              <div class="form-group">
                <label for="mobile">Número de teléfono móvil</label>
                <input type="text" id="mobile" name="mobile" value="<?php echo $getUinfo->mobile; ?>" class="form-control">
              </div>
              <div class="form-group">
                    <label for="idMunicipio">Municipio</label>
                    <select class="form-control" name="idMunicipio">
                      <option value="<?php echo $getUinfo->idMunicipio; ?>">Bogotá</option>
                    </select>
                </div>

              <?php if (Session::get("idRol") == '2') { ?>

              <div class="form-group
              <?php if (Session::get("idRol") == '2' && Session::get("id") == $getUinfo->id) {
                echo "d-none";
              } ?>
              ">
                <div class="form-group">
                  <label for="sel1">Seleccionar rol de usuario</label>
                  <select class="form-control" name="idRol" id="idRol">

                  <?php

                if($getUinfo->idRol == '0'){?>
                  <option value="0" selected='selected'>Postulante</option>
                  <option value="1">Representante legal</option>
                  <option value="2">Administrador</option>
                <?php }elseif($getUinfo->idRol == '1'){?>
                  <option value="0">Postulante</option>
                  <option value="1" selected='selected'>Representante legal</option>
                  <option value="2">Administrador</option>
                <?php }elseif($getUinfo->idRol == '2'){?>
                  <option value="0">Postulante</option>
                  <option value="1">Representante legal</option>
                  <option value="2" selected='selected'>Administrador</option>


                <?php } ?>


                  </select>
                </div>
              </div>

          <?php }else{?>
            <input type="hidden" name="idRol" value="<?php echo $getUinfo->idRol; ?>">
          <?php } ?>

              <?php if (Session::get("id") == $getUinfo->id) {?>


              <div class="form-group">
                <button type="submit" name="update" class="btn btn-success">Actualizar</button>
                <a class="btn btn-primary" href="changepass.php?id=<?php echo $getUinfo->id;?>">Cambio de contraseña</a>
              </div>
            <?php } elseif(Session::get("idRol") == '2') {?>


              <div class="form-group">
                <button type="submit" name="update" class="btn btn-success">Actualizar</button>
                <a class="btn btn-primary" href="changepass.php?id=<?php echo $getUinfo->id;?>">Cambio de contraseña</a>
              </div>

              <?php   }else{ ?>
                  <div class="form-group">

                    <a class="btn btn-primary" href="index.php">OK</a>
                  </div>
                <?php } ?>


          </form>
        </div>

      <?php }else{

        header('Location:index.php');
      } ?>



      </div>
    </div>


  <?php
  include 'inc/footer.php';

  ?>
