<?php

include 'lib/Database.php';
include_once 'lib/Session.php';


class Users{


  // Db Property
  private $db;

  // Db __construct Method
  public function __construct(){
    $this->db = new Database();
  }

  // Date formate Method
   public function formatDate($date){
     // date_default_timezone_set('Asia/Dhaka');
      $strtime = strtotime($date);
    return date('Y-m-d H:i:s', $strtime);
   }



  // Check Exist Email Address Method
  public function checkExistEmail($email){
    $sql = "SELECT email from  tbl_persona WHERE email = :email";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
     $stmt->execute();
    if ($stmt->rowCount()> 0) {
      return true;
    }else{
      return false;
    }
  }
  // Check Exist Nit Address Method
  public function checkExistNit($nit){
    $sql = "SELECT nit from  tbl_empresa WHERE nit = :nit";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindValue(':nit', $nit);
     $stmt->execute();
    if ($stmt->rowCount()> 0) {
      return true;
    }else{
      return false;
    }
  }



  // User Registration Method
  public function userRegistration($data){
    $name = $data['name'];
    $lastName = $data['lastName'];
    $idTdoc = $data['idTdoc'];
    $numberDoc = $data['numberDoc'];
    $mobile = $data['mobile'];
    $email = $data['email'];
    $password = $data['password'];

    $checkEmail = $this->checkExistEmail($email);

    if ($name == "" || $lastName == "" || $idTdoc == "" || $numberDoc == "" || $email == "" || $mobile == "" || $password == "") {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Por favor, el campo de registro del usuario no debe estar vacío.</div>';
        return $msg;
      }elseif (strlen($name) <= 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El nombre de la persona es demasiado corto, ¡al menos 4 letras!</div>';
          return $msg;
      }elseif (filter_var($name,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El Nombre del usuario no puede tener numeros!</div>';
          return $msg;
      }elseif (strlen($lastName) <= 6) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos de la persona es demasiado corto, ¡al menos 6 letras!</div>';
          return $msg;
      }elseif (filter_var($lastName,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos del usuario no puede tener numeros!</div>';
          return $msg;
    }elseif (filter_var($numberDoc,FILTER_SANITIZE_NUMBER_INT) <> TRUE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de documento!</div>';
        return $msg;
    }elseif (filter_var($mobile,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de teléfono móvil!</div>';
        return $msg;
    }elseif(strlen($password) < 7) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Contraseña de al menos 8 caracteres!</div>';
        return $msg;
    }elseif(!preg_match("#[0-9]+#",$password)) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Su contraseña debe contener al menos 1 número!</div>';
        return $msg;
    }elseif(!preg_match("#[a-z]+#",$password)) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Su contraseña debe contener al menos 1 letra!</div>';
        return $msg;
    }elseif ($checkEmail == TRUE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> El correo ya existe, intente con otro correo electrónico ...!</div>';
        return $msg;
    }else{

      $sql = "INSERT INTO tbl_persona(name, lastName, idTdoc, numberDoc, mobile, idMunicipio, email, password) VALUES(:name, :lastName, :idTdoc, :numberDoc, :mobile, :idMunicipio, :email, :password)";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':name', $name);
      $stmt->bindValue(':lastName', $lastName);
      $stmt->bindValue(':idTdoc', $idTdoc);
      $stmt->bindValue(':numberDoc', $numberDoc);
      $stmt->bindValue(':mobile', $mobile);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':password', SHA1($password));
      $result = $stmt->execute();
      if ($result) {
        $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> ¡Wow, se ha registrado correctamente!</div>';
          return $msg;
      }else{
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Ups, lo sentimos.. algo salió mal !</div>';
          return $msg;
      }



    }





  }
  // Add New User By Admin
  public function addNewUserByAdmin($data){
    $name = $data['name'];
    $lastName = $data['lastName'];
    $idTdoc = $data['idTdoc'];
    $numberDoc = $data['numberDoc'];
    $mobile = $data['mobile'];
    $email = $data['email'];
    $password = $data['password'];
    $idRol = $data['idRol'];

    $checkEmail = $this->checkExistEmail($email);

    if ($name == "" || $lastName == "" || $idTdoc == "" || $numberDoc == "" || $email == "" || $mobile == "" || $password == "") {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Los campos de entrada no deben estar vacíos!</div>';
        return $msg;
    }elseif (strlen($name) <= 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El nombre de la persona es demasiado corto, ¡al menos 4 letras!</div>';
          return $msg;
      }elseif (filter_var($name,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El Nombre del usuario no puede tener numeros!</div>';
          return $msg;
      }elseif (strlen($lastName) <= 6) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos de la persona es demasiado corto, ¡al menos 6 letras!</div>';
          return $msg;
      }elseif (filter_var($lastName,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos del usuario no puede tener numeros!</div>';
          return $msg;
    }elseif (filter_var($numberDoc,FILTER_SANITIZE_NUMBER_INT) <> TRUE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de documento!</div>';
        return $msg;
    }elseif (filter_var($mobile,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de teléfono móvil!</div>';
        return $msg;
    }elseif(strlen($password) < 5) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Contraseña de al menos 6 caracteres!</div>';
        return $msg;
    }elseif(!preg_match("#[0-9]+#",$password)) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Su contraseña debe contener al menos 1 número!</div>';
        return $msg;
    }elseif(!preg_match("#[a-z]+#",$password)) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Su contraseña debe contener al menos 1 Letra!</div>';
        return $msg;
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Dirección de correo electrónico inválida.</div>';
        return $msg;
    }elseif ($checkEmail == TRUE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> El correo electrónico ya existe, intente con otro correo electrónico ...!</div>';
        return $msg;
    }else{

      $sql = "INSERT INTO tbl_persona(name, lastName, idTdoc, numberDoc, mobile, idMunicipio, email, password, idRol) VALUES(:name, :lastName, :idTdoc, :numberDoc, :mobile, :idMunicipio, :email, :password, :idRol)";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':name', $name);
      $stmt->bindValue(':lastName', $lastName);
      $stmt->bindValue(':idTdoc', $idTdoc);
      $stmt->bindValue(':numberDoc', $numberDoc);
      $stmt->bindValue(':mobile', $mobile);
      $stmt->bindValue(':idMunicipio', $idMunicipio);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':password', SHA1($password));
      $stmt->bindValue(':idRol', $idRol);
      $result = $stmt->execute();
      if ($result) {
        $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> ¡Wow, se ha registrado correctamente!</div>';
          return $msg;
      }else{
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Ups, lo sentimos.. algo salió mal !</div>';
          return $msg;
      }



    }





  }

  // Add New Vacante By Admin
  public function addNewCompanyByAdmin($data){
    $nit = $data['nit'];
    $razSocial = $data['razSocial'];
    $actEconomica = $data['actEconomica'];

    $checknit = $this->checkExistNit($nit);

    if ($nit == "" || $razSocial == "" || $actEconomica == "") {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Los campos de entrada no deben estar vacíos!</div>';
        return $msg;
    }elseif (strlen($nit) <= 9) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El N.I.T de la empresa no puede ser menor a nueve numeros</div>';
          return $msg;
      }elseif (filter_var($nit,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El Nit no puede tener Letras!</div>';
          return $msg;
      }elseif (strlen($razSocial) <= 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> La razon social de la empresa es demaciado corto, ¡al menos 3 letras!</div>';
          return $msg;
        }elseif ($checknit == TRUE) {
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> El nit ya existe, intente con otro número de identificaión tributaria ...!</div>';
            return $msg;
    }else{

      $sql = "INSERT INTO tbl_empresa(nit, razSocial, actEconomica, idMunicipio, idRol) VALUES(:nit, :razSocial, :actEconomica, :idMunicipio, :idRol)";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':nit', $nit);
      $stmt->bindValue(':razSocial', $razSocial);
      $stmt->bindValue(':actEconomica', $actEconomica);
      $stmt->bindValue(':idMunicipio', $idMunicipio);
      $stmt->bindValue(':idRol', 1);
      $result = $stmt->execute();
      if ($result) {
        $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> ¡Wow, se ha registrado correctamente!</div>';
          return $msg;
      }else{
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Ups, lo sentimos.. algo salió mal !</div>';
          return $msg;
      }



    }





  }


  // Add New Vacante By Admin
  public function addNewVacanteByAdmin($data){
    $descripcion = $data['descripcion'];
    $salario = $data['salario'];
    $email = $data['email'];
    $idCargo = $data['idCargo'];
    $idEmpresa = $data['idEmpresa'];

    if ($descripcion == "" || $salario == "" || $email == "" || $idCargo == "" || $idCargo == "") {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Los campos de entrada no deben estar vacíos!</div>';
        return $msg;
    }elseif (strlen($descripcion) <= 10) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> la descricion de la vacante no puede ser menor de 10 letras!</div>';
          return $msg;
      }elseif (strlen($salario) < 7) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong>¡El salario no puede ser menor a 1SMLV!</div>';
          return $msg;
        }elseif (filter_var($salario,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> El salario no puede tener Letras!</div>';
            return $msg;
    }else{

      $sql = "INSERT INTO tbl_vacante(descripcion, salario, email, idCargo, idEmpresa, idMunicipio) VALUES(:descripcion, :salario, :email, :idCargo, :idEmpresa, :idMunicipio)";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':descripcion', $descripcion);
      $stmt->bindValue(':salario', $salario);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':idCargo', $idCargo);
      $stmt->bindValue(':idEmpresa', $idEmpresa);
      $stmt->bindValue(':idMunicipio', $idMunicipio);
      $result = $stmt->execute();
      if ($result) {
        $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success !</strong> ¡Wow, se ha registrado correctamente!</div>';
          return $msg;
      }else{
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Ups, lo sentimos.. algo salió mal !</div>';
          return $msg;
      }



    }





  }



  // Select All User Method
  public function selectAllUserData(){
    $sql = "SELECT * FROM tbl_persona ORDER BY id DESC";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  // Select All User Method
  public function selectAllCompanyData(){
    $sql = "SELECT * FROM tbl_empresa e INNER JOIN tbl_municipio m ON e.idMunicipio = m.id";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  // Select All User Method
  public function selectAllVacanteData(){
    $sql = ("SELECT * FROM tbl_vacante v INNER JOIN tbl_empresa e ON v.idEmpresa = e.id");
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // User login Autho Method
  public function userLoginAutho($email, $password){
    $password = SHA1($password);
    $sql = "SELECT * FROM tbl_persona WHERE email = :email and password = :password LIMIT 1";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }
  // Check User Account Satatus
  public function CheckActiveUser($email){
    $sql = "SELECT * FROM tbl_persona WHERE email = :email and isActive = :isActive LIMIT 1";
    $stmt = $this->db->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':isActive', 1);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
  }




    // User Login Authotication Method
    public function userLoginAuthotication($data){
      $email = $data['email'];
      $password = $data['password'];


      $checkEmail = $this->checkExistEmail($email);

      if ($email == "" || $password == "" ) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El correo electrónico o la contraseña no debe estar vacía!</div>';
          return $msg;
      }elseif ($checkEmail == FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> No se encontró el correo electrónico, utilice el correo electrónico de registro o la contraseña, por favor.</div>';
          return $msg;
      }else{


        $logResult = $this->userLoginAutho($email, $password);
        $chkActive = $this->CheckActiveUser($email);

        if ($chkActive == TRUE) {
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Lo sentimos, su cuenta está desactivada, póngase en contacto con el administrador.</div>';
            return $msg;
        }elseif ($logResult) {

          Session::init();
          Session::set('login', TRUE);
          Session::set('id', $logResult->id);
          Session::set('name', $logResult->name);
          Session::set('lastName', $logResult->lastName);
          Session::set('idTdoc', $logResult->idTdoc);
          Session::set('numberDoc', $logResult->numberDoc);
          Session::set('mobile', $logResult->mobile);
          Session::set('idMunicipio', $logResult->idMunicipio);
          Session::set('email', $logResult->email);
          Session::set('password', $logResult->password);
          Session::set('idRol', $logResult->idRol);
          Session::set('logMsg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> ¡Ha iniciado sesión correctamente!</div>');
          echo "<script>location.href='index.php';</script>";

        }else{
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡El correo electrónico o la contraseña no coinciden!</div>';
            return $msg;
        }

      }


    }

    // Get Single User Information By Id Method
    public function getUserInfoById($id){
      $sql = "SELECT * FROM tbl_persona WHERE id = :id LIMIT 1";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_OBJ);
      if ($result) {
        return $result;
      }else{
        return false;
      }


    }
    // Get Single User Information By Id Method
    public function getVacanteInfoById($id){
      $sql = "SELECT * FROM tbl_vacante WHERE id = :id LIMIT 1";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_OBJ);
      if ($result) {
        return $result;
      }else{
        return false;
      }


    }



  //
  //   Get Single User Information By Id Method
    public function updateUserByIdInfo($id, $data){
    $name = $data['name'];
    $lastName = $data['lastName'];
    $idTdoc = $data['idTdoc'];
    $numberDoc = $data['numberDoc'];
    $mobile = $data['mobile'];
    $idMunicipio = $data['idMunicipio'];
    $idRol = $data['idRol'];
        if ($name == "" || $lastName == "" || $idTdoc == "" || $numberDoc == "" || $mobile == "" || $idMunicipio == "") {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Por favor, el campo de registro del usuario no debe estar vacío.</div>';
        return $msg;
      }elseif (strlen($name) <= 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El nombre de la persona es demasiado corto, ¡al menos 4 letras!</div>';
          return $msg;
      }elseif (filter_var($name,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El Nombre del usuario no puede tener numeros!</div>';
          return $msg;
      }elseif (strlen($lastName) <= 6) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos de la persona es demasiado corto, ¡al menos 6 letras!</div>';
          return $msg;
      }elseif (filter_var($lastName,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos del usuario no puede tener numeros!</div>';
          return $msg;
    }elseif (filter_var($numberDoc,FILTER_VALIDATE_INT) <> TRUE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de documento!</div>';
        return $msg;
    }elseif (filter_var($mobile,FILTER_VALIDATE_INT) == FALSE ) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de teléfono móvil!</div>';
        return $msg;
    }else{
        $sql = "UPDATE tbl_persona SET
          name = :name,
          lastName = :lastName,
          idTdoc = :idTdoc,
          numberDoc = :numberDoc,
          mobile = :mobile,
          idMunicipio = :idMunicipio,
          idRol = :idRol
          WHERE id = :id";
          $stmt= $this->db->pdo->prepare($sql);
          $stmt->bindValue(':name', $name);
          $stmt->bindValue(':lastName', $lastName);
          $stmt->bindValue(':idTdoc', $idTdoc);
          $stmt->bindValue(':numberDoc', $numberDoc);
          $stmt->bindValue(':mobile', $mobile);
          $stmt->bindValue(':idMunicipio', $idMunicipio);
          $stmt->bindValue(':idRol', $idRol);
          $stmt->bindValue(':id', $id);
        $result =   $stmt->execute();

        if ($result) {
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> ¡Wow su información se actualizó correctamente!</div>');



        }else{
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no insertados!</div>');


        }


      }


    }
  //   Get Single Vacante Information By Id Method
    public function updateVacanteByIdInfo($id, $data){
    $descripcion = $data['descripcion'];
    $salario = $data['salario'];
    $email = $data['email'];
    $idEmpresa = $data['idEmpresa'];
    $idCargo = $data['idCargo'];
    $idMunicipio = $data['idMunicipio'];
    $idRol = $data['idRol'];
        if ($descripcion == "" || $salario == "" || $email == "" || $idEmpresa == "" || $idCargo == "" || $idMunicipio == "") {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Por favor, el campo de registro del usuario no debe estar vacío.</div>';
        return $msg;
      }elseif (strlen($descripcion) <= 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El nombre de la persona es demasiado corto, ¡al menos 4 letras!</div>';
          return $msg;
      }elseif (filter_var($descripcion,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El Nombre del usuario no puede tener numeros!</div>';
          return $msg;
      }elseif (strlen($salario) <= 6) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos de la persona es demasiado corto, ¡al menos 6 letras!</div>';
          return $msg;
      }elseif (filter_var($salario,FILTER_SANITIZE_NUMBER_INT) <> FALSE) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Los Apellidos del usuario no puede tener numeros!</div>';
          return $msg;
    }elseif (filter_var($idEmpresa,FILTER_VALIDATE_INT) <> TRUE) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de documento!</div>';
        return $msg;
    }elseif (filter_var($idCargo,FILTER_VALIDATE_INT) == FALSE ) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> ¡Ingrese solo caracteres numéricos para el campo de número de teléfono móvil!</div>';
        return $msg;
    }else{
        $sql = "UPDATE tbl_vacante SET
          descripcion = :descripcion,
          salario = :salario,
          email = :email,
          idEmpresa = :idEmpresa,
          idCargo = :idCargo,
          idMunicipio = :idMunicipio,
          idRol = :idRol
          WHERE id = :id";
          $stmt= $this->db->pdo->prepare($sql);
          $stmt->bindValue(':descripcion', $descripcion);
          $stmt->bindValue(':salario', $salario);
          $stmt->bindValue(':email', $email);
          $stmt->bindValue(':idEmpresa', $idEmpresa);
          $stmt->bindValue(':idCargo', $idCargo);
          $stmt->bindValue(':idMunicipio', $idMunicipio);
          $stmt->bindValue(':idRol', $idRol);
          $stmt->bindValue(':id', $id);
        $result =   $stmt->execute();

        if ($result) {
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> ¡Wow su información se actualizó correctamente!</div>');



        }else{
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no insertados!</div>');


        }


      }


    }

    // Delete User by Id Method
    public function deleteUserById($remove){
      $sql = "DELETE FROM tbl_persona WHERE id = :id ";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':id', $remove);
        $result =$stmt->execute();
        if ($result) {
          $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Cuenta de usuario eliminada correctamente!</div>';
            return $msg;
        }else{
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no eliminados!</div>';
            return $msg;
        }
    }
    // Delete User by Id Method
    public function deleteCompanyById($remove){
      $sql = "DELETE FROM tbl_empresa WHERE id = :id ";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':id', $remove);
        $result =$stmt->execute();
        if ($result) {
          $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Cuenta de usuario eliminada correctamente!</div>';
            return $msg;
        }else{
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no eliminados!</div>';
            return $msg;
        }
    }
    // Delete Vacante by Id Method
    public function deleteVacantesById($remove){
      $sql = "DELETE FROM tbl_vacante WHERE id = :id ";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':id', $remove);
        $result =$stmt->execute();
        if ($result) {
          $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Vacante eliminada correctamente!</div>';
            return $msg;
        }else{
          $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no eliminados!</div>';
            return $msg;
        }
    }

    // User Deactivated By Admin
    public function userDeactiveByAdmin($deactive){
      $sql = "UPDATE tbl_persona SET

       isActive=:isActive
       WHERE id = :id";

       $stmt = $this->db->pdo->prepare($sql);
       $stmt->bindValue(':isActive', 1);
       $stmt->bindValue(':id', $deactive);
       $result =   $stmt->execute();
        if ($result) {
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Cuenta de usuario desactivada correctamente!</div>');

        }else{
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no desactivados!</div>');

            return $msg;
        }
    }
    // User Deactivated By Admin
    public function companyDeactiveByAdmin($deactive){
      $sql = "UPDATE tbl_empresa SET

       isActive=:isActive
       WHERE id = :id";

       $stmt = $this->db->pdo->prepare($sql);
       $stmt->bindValue(':isActive', 1);
       $stmt->bindValue(':id', $deactive);
       $result =   $stmt->execute();
        if ($result) {
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Cuenta de usuario desactivada correctamente!</div>');

        }else{
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no desactivados!</div>');

            return $msg;
        }
    }
    // Vacante Deactivated By Admin
    public function vacantesDeactiveByAdmin($desactive){
      $sql = "UPDATE tbl_vacante SET

       isActive = :isActive
       WHERE id = :id";

       $stmt = $this->db->pdo->prepare($sql);
       $stmt->bindValue(':isActive', 1);
       $stmt->bindValue(':id', $desactive);
       $result =   $stmt->execute();
        if ($result) {
          echo "<script>location.href='vacantes.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Vacante desactivada correctamente!</div>');

        }else{
          echo "<script>location.href='vacantes.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no desactivados!</div>');

            return $msg;
        }
    }


    // User Deactivated By Admin
    public function userActiveByAdmin($active){
      $sql = "UPDATE tbl_persona SET
       isActive=:isActive
       WHERE id = :id";

       $stmt = $this->db->pdo->prepare($sql);
       $stmt->bindValue(':isActive', 0);
       $stmt->bindValue(':id', $active);
       $result =   $stmt->execute();
        if ($result) {
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Cuenta de usuario activada con éxito!</div>');
        }else{
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no activados!</div>');
        }
    }
    // User Deactivated By Admin
    public function companyActiveByAdmin($active){
      $sql = "UPDATE tbl_empresa SET
       isActive=:isActive
       WHERE id = :id";

       $stmt = $this->db->pdo->prepare($sql);
       $stmt->bindValue(':isActive', 0);
       $stmt->bindValue(':id', $active);
       $result =   $stmt->execute();
        if ($result) {
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Cuenta de usuario activada con éxito!</div>');
        }else{
          echo "<script>location.href='index.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no activados!</div>');
        }
    }

    // Vacante Deactivated By Admin
    public function vacantesActiveByAdmin($active){
      $sql = "UPDATE tbl_vacante SET
       isActiveV=:isActiveV
       WHERE id = :id";

       $stmt = $this->db->pdo->prepare($sql);
       $stmt->bindValue(':isActiveV', 0);
       $stmt->bindValue(':id', $active);
       $result =   $stmt->execute();
        if ($result) {
          echo "<script>location.href='vacantes.php';</script>";
          Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success !</strong> Vacante activada con éxito!</div>');
        }else{
          echo "<script>location.href='vacantes.php';</script>";
          Session::set('msg', '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> ¡Datos no activados!</div>');
        }
    }




    // Check Old password method
    public function CheckOldPassword($id, $old_pass){
      $old_pass = SHA1($old_pass);
      $sql = "SELECT password FROM tbl_persona WHERE password = :password AND id =:id";
      $stmt = $this->db->pdo->prepare($sql);
      $stmt->bindValue(':password', $old_pass);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return true;
      }else{
        return false;
      }
    }



    // Change User pass By Id
    public  function changePasswordBysingelid($id, $data){

      $old_pass = $data['old_password'];
      $new_pass = $data['new_password'];


      if ($old_pass == "" || $new_pass == "" ) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> El campo de contraseña no debe estar vacío.</div>';
          return $msg;
      }elseif (strlen($new_pass) < 6) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> ¡La nueva contraseña debe tener al menos 6 caracteres!</div>';
          return $msg;
       }

         $oldPass = $this->CheckOldPassword($id, $old_pass);
         if ($oldPass == FALSE) {
           $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Error !</strong> ¡La contraseña anterior no coincide!</div>';
             return $msg;
         }else{
           $new_pass = SHA1($new_pass);
           $sql = "UPDATE tbl_persona SET

            password=:password
            WHERE id = :id";

            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindValue(':password', $new_pass);
            $stmt->bindValue(':id', $id);
            $result =   $stmt->execute();

          if ($result) {
            echo "<script>location.href='index.php';</script>";
            Session::set('msg', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success !</strong> ¡Buenas noticias, contraseña cambiada con éxito!</div>');

          }else{
            $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error !</strong> ¡La contraseña no cambió!</div>';
              return $msg;
          }

         }



    }









  }
