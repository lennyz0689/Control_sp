<?php
include 'inc/header.php';

Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>
<?php

if (isset($_GET['remove'])) {
  $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
  $removeUser = $users->deleteUserById($remove);
}

if (isset($removeUser)) {
  echo $removeUser;
}
if (isset($_GET['deactive'])) {
  $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
  $deactiveId = $users->userDeactiveByAdmin($deactive);
}

if (isset($deactiveId)) {
  echo $deactiveId;
}
if (isset($_GET['active'])) {
  $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
  $activeId = $users->userActiveByAdmin($active);
}

if (isset($activeId)) {
  echo $activeId;
}

 ?>
      <div class="card ">
        <div class="card-header">
          <h3><i class="fas fa-users mr-2"></i>Lista de Usuarios <span class="float-right">Bienvenido! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
$name = Session::get('name');
if (isset($name)) {
  echo $name;
}
 ?></span>

          </strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">Id</th>
                      <th  class="text-center">Nombres</th>
                      <th  class="text-center">Apellidos</th>
                      <th  class="text-center">Correo electrónico</th>
                      <th  class="text-center">Móvil</th>
                      <th  class="text-center">Estado</th>
                      <th  class="text-center">Creado</th>
                      <th  width='25%' class="text-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $allUser = $users->selectAllUserData();

                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
                      <?php if (Session::get("id") == $value->id) {
                        echo "style='background:#d9edf7' ";
                      } ?>
                      >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value->name; ?> <br>
                          <?php if ($value->idRol  == '0'){
                          echo "<span class='badge badge-lg badge-dark text-white'>Postulante</span>";
                        } elseif ($value->idRol == '1') {
                          echo "<span class='badge badge-lg badge-warning text-white'>Representante legal</span>";
                        }elseif ($value->idRol == '2') {
                            echo "<span class='badge badge-lg badge-info text-white'>Administrador</span>";
                        } ?></td>
                        <td><?php echo $value->lastName; ?></td>
                        <td><?php echo $value->email; ?></td>

                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $value->mobile; ?></span></td>
                        <td>
                          <?php if ($value->isActive == '0') { ?>
                          <span class="badge badge-lg badge-info text-white">Activo</span>
                        <?php }else{ ?>
                    <span class="badge badge-lg badge-danger text-white">Deshabilitado</span>
                        <?php } ?>
                        </td>
                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $users->formatDate($value->createdAt);  ?></span></td>

                        <td>
                          <?php if ( Session::get("idRol") == '2') {?>
                            <a class="btn btn-success btn-sm
                            " href="profile.php?id=<?php echo $value->id;?>">Ver</a>
                            <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Editar</a>
                            <a onclick="return confirm('Are you sure To Delete ?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                      echo "disabled";
                    } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Eliminar</a>

                             <?php if ($value->isActive == '0') {  ?>
                               <a onclick="return confirm('¿Estas seguro de desactivar al usuario?')" class="btn btn-warning
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?deactive=<?php echo $value->id;?>">Deshabilitar</a>
                             <?php } elseif($value->isActive == '1'){?>
                               <a onclick="return confirm('¿Esta seguro de activar el usuario?')" class="btn btn-secondary
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?active=<?php echo $value->id;?>">Activar</a>
                             <?php } ?>




                        <?php  }elseif(Session::get("id") == $value->id  && Session::get("idRol") == '2'){ ?>
                          <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">Ver</a>
                          <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Editar</a>
                        <?php  }elseif( Session::get("idRol") == '2'){ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->idRol == '2') {
                            echo "enabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">Ver</a>
                          <a class="btn btn-warning 
                          <?php if ($value->idRol == '2') {
                            echo "enabled";
                          } ?>
                          " href="#?id=<?php echo $value->id;?>">Aplicar</a>
                        <?php }elseif(Session::get("id") == $value->id  && Session::get("idRol") == '1'){ ?>
                          <a class="btn btn-success btn-sm " href="profile.php?id=<?php echo $value->id;?>">Ver</a>
                          <a class="btn btn-info btn-sm " href="profile.php?id=<?php echo $value->id;?>">Editar</a>
                        <?php }else{ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->idRol == '2') {
                            echo "disabled";
                          } ?>
                          " href="profile.php?id=<?php echo $value->id;?>">Ver</a>

                        <?php } ?>

                        </td>
                      </tr>
                    <?php }}else{ ?>
                      <tr class="text-center">
                      <td>¡Ningún usuario disponible ahora!</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>









        </div>
      </div>



  <?php
  include 'inc/footer.php';

  ?>
