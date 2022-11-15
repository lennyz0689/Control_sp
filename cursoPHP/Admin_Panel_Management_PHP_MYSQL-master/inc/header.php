<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Session.php";
Session::init();



spl_autoload_register(function($classes){

  include 'classes/'.$classes.".php";

});


$users = new Users();

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Control_sp</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body background="/cursoPHP/Admin_Panel_Management_PHP_MYSQL-master/img/Fondo.jpg" class="cuerpo">
        <h1 class="control"><img src="/cursoPHP/Admin_Panel_Management_PHP_MYSQL-master/img/LOGO.png" alt="" height="200px" width="auto"><br>Control De <br> Seguridad Privada</h1>


<?php


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  // <strong>Success !</strong> You are Logged Out Successfully !</div>');
  Session::destroy();
}



 ?>


    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">



          <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('idRol') == '2') { ?>
              <li class="nav-item">
                <a class="nav-link" href="company.php"><i class="fa solid fa-file mr-2"></i>Entidades </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vacantes.php"><i class="fas fa-address-book mr-2"></i>Vacantes </span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>Usuarios </span></a>
              </li>
              <li class="nav-item

              <?php
                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }
                         ?>">

                <a class="nav-link" href="addUser.php"><i class="fas fa-user-plus mr-2"></i>Agregar usuario </span></a>
              </li>
              <li class="nav-item

              <?php
                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }
                         ?>">

                <a class="nav-link" href="addCompany.php"><i class="fas fa-user-plus mr-2"></i>Agregar Empresa </span></a>
              </li>
            <?php  } ?>
            <li class="nav-item
            <?php

      				$path = $_SERVER['SCRIPT_FILENAME'];
      				$current = basename($path, '.php');
      				if ($current == 'profile') {
      					echo "active ";
      				}

      			 ?>

            ">
            <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('idRol') == '0') { ?>
              <li class="nav-item">
                  <a class="nav-link" href="#.php"><i class="fas fa-users mr-2"></i>Formacion </span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#.php"><i class="fas fa-users mr-2"></i>Experiencia </span></a>
              </li>
              <?php  } ?>
              <?php  } ?>
              <?php if (Session::get('id') == TRUE) { ?>
            <?php if (Session::get('idRol') == '1') { ?>

              <li class="nav-item

              <?php
                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }
                         ?>">

                <a class="nav-link" href="addVacante.php"><i class="fas fa-user-plus mr-2"></i>Agregar Vacante </span></a>
                </li>
            <?php  } ?>
            <?php  } ?>   

              <a class="nav-link" href="profile.php?id=<?php echo Session::get("id"); ?>"><i class="fab fa-500px mr-2"></i>Perfil <span class="sr-only">(Actual)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
            </li>
          <?php }else{ ?>
                <a class="nav-link" href="register.php"><i class="fas fa-user-plus mr-2"></i>Registrarse</a>
              </li>
              <li class="nav-item
                <?php
                    				$path = $_SERVER['SCRIPT_FILENAME'];
                    				$current = basename($path, '.php');
                    				if ($current == 'login') {
                    					echo " active ";
                    				}
                    			 ?>">
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt mr-2"></i>Acceso</a>
              </li>

          <?php } ?>

          </ul>

        </div>
      </nav>
