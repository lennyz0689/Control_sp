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
  $removeUser = $users->deleteVacantesById($remove);
}

if (isset($removeUser)) {
  echo $removeUser;
}
if (isset($_GET['desactive'])) {
  $desactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['desactive']);
  $desactiveId = $users->vacantesDeactiveByAdmin($desactive);
}

if (isset($desactiveId)) {
  echo $desactiveId;
}
if (isset($_GET['active'])) {
  $active = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['active']);
  $activeId = $users->vacantesActiveByAdmin($active);
}

if (isset($activeId)) {
  echo $activeId;
}


 ?>
      <div class="card ">
        <div class="card-header">
          <h3><i class="fas fa-address-book mr-2"></i>Lista de Vacantes <span class="float-right">Bienvenido! <strong>
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
                      <th  class="text-center">Empresa</th>
                      <th  class="text-center">Descripcion</th>
                      <th  class="text-center">salario</th>
                      <th  class="text-center">cargo</th>
                      <th  class="text-center">Correo electronico</th>
                      <th  class="text-center">Creado</th>
                      <th  class="text-center">Estado</th>
                      <th  width='25%' class="text-center">Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                      $allUser = $users->selectAllVacanteData();
                      if ($allUser) {
                        $id = 0;
                        foreach ($allUser as  $value) {
                          $id++;

                     ?>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $value->razSocial;?><br>
                        <td><?php echo $value->descripcion; ?></td>
                        <td><?php echo $value->salario; ?></td>
                        <td>
                          <?php if ($value->idCargo == '0') { ?>
                          <span class="badge badge-lg badge-success text-white">Vigilante</span>
                          <?php }elseif($value->idCargo =='1'){ ?>
                          <span class="badge badge-lg badge-primary text-white">Escolta</span>
                          <?php }else{ ?>
                          <span class="badge badge-lg badge-warning text-white">Manejador de medios</span>
                          <?php } ?>
                        </td>
                        <td><?php echo $value->email; ?></td>
                        <td><span class="badge badge-lg badge-secondary text-white"><?php echo $users->formatDate($value->createdAt);  ?></span></td>
                        <td>
                          <?php if ($value->isActive == '0') { ?>
                          <span class="badge badge-lg badge-info text-white">Activo</span>
                        <?php }else{ ?>
                    <span class="badge badge-lg badge-danger text-white">Deshabilitado</span>
                        <?php } ?>
                        </td>
                        <td>
                          <?php if ( Session::get("idRol") == '2') {?>
                            <a class="btn btn-success btn-sm
                            " href="profileVacante.php?id=<?php echo $value->id;?>">Ver</a>
                            <a class="btn btn-info btn-sm " href="profileVacante.php?id=<?php echo $value->id;?>">Editar</a>
                            <a onclick="return confirm('¿Esta seguro de eliminar la vacante?')" class="btn btn-danger
                    <?php if (Session::get("id") == $value->id) {
                      echo "disabled";
                    } ?>
                             btn-sm " href="?remove=<?php echo $value->id;?>">Eliminar</a>

                             <?php if ($value->isActive == '0') {  ?>
                               <a onclick="return confirm('¿Esta seguro de deshabilitar la vacante?')" class="btn btn-warning
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?desactive=<?php echo $value->id;?>">Deshabilitar</a>
                             <?php } elseif($value->isActive == '1'){?>
                               <a onclick="return confirm('¿Esta seguro de activar la vacante?')" class="btn btn-secondary
                       <?php if (Session::get("id") == $value->id) {
                         echo "disabled";
                       } ?>
                                btn-sm " href="?active=<?php echo $value->id;?>">Activar</a>
                             <?php } ?>

                        <?php  }elseif(Session::get("id") == $value->id  && Session::get("idRol") == '2'){ ?>
                          <a class="btn btn-success btn-sm " href="profileVacante.php?id=<?php echo $value->id;?>">Ver</a>
                          <a class="btn btn-info btn-sm " href="profileVacante.php?id=<?php echo $value->id;?>">Editar</a>
                        <?php  }elseif( Session::get("idRol") == '0'){ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->idRol == '0') {
                            echo "enabled";
                          } ?>
                          " href="profileVacante.php?id=<?php echo $value->id;?>">Ver</a>
                          <a class="btn btn-warning 
                          <?php if ($value->idRol == '0') {
                            echo "enabled";
                          } ?>
                          " href="#?id=<?php echo $value->id;?>">Aplicar</a>
                        <?php }elseif(Session::get("id") == $value->id  && Session::get("idRol") == '1'){ ?>
                          <a class="btn btn-success btn-sm " href="profileVacante.php?id=<?php echo $value->id;?>">Ver</a>
                          <a class="btn btn-info btn-sm " href="profileVacante.php?id=<?php echo $value->id;?>">Editar</a>
                        <?php }else{ ?>
                          <a class="btn btn-success btn-sm
                          <?php if ($value->idRol == '1') {
                            echo "disabled";
                          } ?>
                          " href="profileVacante.php?id=<?php echo $value->id;?>">Ver</a>

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