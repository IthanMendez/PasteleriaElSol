<?php
session_start();
include_once 'database\conexion.php';
// include('session.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$objeto2 = new Conexion();
$db = $objeto2->ConectarSqli();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  
  $myemail = mysqli_real_escape_string($db,$_POST['email']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
  
  $sql = "SELECT numCuenta FROM cuenta WHERE correo = '$myemail' and contrasena = '$mypassword'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  // $active = $row['active'];
  
  $count = mysqli_num_rows($result);
  
  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count == 1) {
    $_SESSION['login_user'] = $myemail;
     
    header("location: catalogo.php");
  }else {
    echo "<script> alert('Los datos ingresados son invalidos.') </script>";
  }
}
?>

<!doctype html>
<html lang="en">
  <head> 
    
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#" />
    <title>Inicio</title>
    <!-- Otros -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        
      
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="login.php" class="nav-link px-2 link-primary">Inicio</a></li>
          <li><a href="catalogo.php" class="nav-link px-2 link-dark">Catalogo</a></li>
        </ul>

        <?php require_once("php/carticon.php")?>

        <?php 

          if(isset($_SESSION['login_user'])){
            require_once("php/usernav.php");
          }
        ?>

      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row d-flex justify-content-center">
    <div class="col-md-5 col-lg-5 col-xl-4">
      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Ingresa</p>
        <form name="frmUser" method="post" action="" align="center">
          

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Correo electrónico</label>
            <input type="email" id="form3Example3" class="form-control form-control-lg" name="email"
              placeholder="Ingresa un correo electrónico válido" maxlength="40" required/>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Contraseña</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg" name="password"
              placeholder="Ingresa contraseña" maxlength="50" required/>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Recordarme
              </label>
            </div>
            <a href="#!" class="text-body">¿Olvidaste tú contraseña?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit" href="#">Entrar</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes cuenta? <a href="register.php"
                class="link-danger">Regístrate</a></p>
          </div>

        </form>
      </div>
      <div class="col-sm-1 middle-border"></div>
											<div class="col-sm-1"></div>
      <div class="col-md-5 col-lg-5 col-xl-4">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrarte</p>
        <form action="register_query.php" method="POST">

        <!-- Name input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example2">Tú nombre</label>
            <input type="text" id="nombreCliente" name="nombreCliente" class="form-control form-control-lg"
              placeholder="Ingresa tú nombre" maxlength="100" required/>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Correo electrónico</label>
            <input type="email" id="correo" name="correo" class="form-control form-control-lg" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
              placeholder="Ingresa un correo electrónico válido" maxlength="40" required/>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control form-control-lg" pattern="(?=^.{8,40}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).*"
              placeholder="Ingresa contraseña" maxlength="50" required/>
          </div>

          <!-- Re - password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example5">Repite la contraseña</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg"
              placeholder="Ingresa de nuevo la contraseña" maxlength="50" required/>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" name="register">Registrar</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">¿Ya tienes cuenta? <a href="login.php"
                class="link-danger">Ingresa</a></p>
          </div>

        </form>
    </div>
      
    </div>

    
    <script src="jQuery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
</html>
