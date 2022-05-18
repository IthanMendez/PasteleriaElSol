<?php
session_start();
include_once 'database\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$objeto2 = new Conexion();
$db = $objeto2->ConectarSqli();


if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  $user_ID = mysqli_real_escape_string($db,$_POST['email']);
  $myemail = mysqli_real_escape_string($db,$_POST['email']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
  
  $sql = "SELECT idAdmin FROM usermaster WHERE correo = '$myemail' and contrasena = '$mypassword'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
  $count = mysqli_num_rows($result);
  if($count == 1) {
    $_SESSION['login_admin'] = $myemail;
     
    header("location: home.php");
  }else {
    $sql = "SELECT numCuenta FROM cuenta WHERE correo = '$myemail' and contrasena = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $user_ID = mysqli_fetch_assoc($result);
    $resultstring = $user_ID['numCuenta'];
    $_SESSION['id_user'] = $resultstring;
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);

    if($count == 1) {
      $_SESSION['login_user'] = $myemail;
      
      

      header("location: home.php");
    }else{
      echo "<script> alert('Los datos ingresados son invalidos.') </script>";
    }
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
    <title>Iniciar sesión</title>
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
    
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" >
      
    <a href="catalogo.php">
      <img src="img/sunlogo2.png"  width="30%" height="40%" class="rounded mx-auto d-block" alt="Responsive image">
    </a>
    
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      
        <li><a href="home.php" class="nav-link px-2 link-primary fs-4 fw-bold" >Inicio</a></li>
        <li><a href="categorias.php" class="nav-link px-2 link-dark fs-4 fw-bold">Catalogo</a></li>
        
      
      
      <?php 

        if(isset($_SESSION['login_user'])){
          ?>
	    <a href="historial.php" class="nav-link px-2 link-dark fs-4 fw-bold">Historial</a>
      <li><a href="pedido.php" class="nav-link px-2 link-dark fs-4 fw-bold">Realizar Pedido</a></li>
          </ul>
          <?php 
          require_once("php/usernav.php");
        }
        elseif(isset($_SESSION['login_admin'])){
          ?>
            <a href="pedidospendientes.php" class="nav-link px-2 link-dark fs-4 fw-bold">Pedidos</a>
            <a href="visual_Pagos.php" class="nav-link px-2 link-dark fs-4 fw-bold">Pagos</a>
            <a href="inventario.php" class="nav-link px-2 link-dark fs-4 fw-bold">Inventario</a>
            </ul>
          <?php
          require_once("php/usernav.php");
        }
        else{
          ?>
          </ul>
          <a href="login.php" class="nav-link px-2 link-dark fs-4 fw-bold"  >Ingresar</a>
          
          <?php
        }
      ?>
    </div>
  </header>
  <form class="form-register"" action="php/register_pedido.php" method="POST">
    <h4>Registro de pedido</h4>
    <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
    <select class="controls" aria-label="Default select example" id="SaborID" name="SaborID">
      <option selected>Sabor</option>
      <?php 
        $query = $db -> query ("SELECT * FROM sabor");
        while ($valor = mysqli_fetch_array($query)) {
          echo '<option value="'.$valor[SaborID].'">'.$valor[Nombre].'</option>';
         
          $_COOKIE['total'] += $valor[Costo];
        }
      ?>
    </select>
    <select class="controls" aria-label="Default select example" id="RellenoID" name="RellenoID">
      <option selected>Relleno</option>
      <?php 
        $query = $db -> query ("SELECT * FROM relleno");
        while ($valor = mysqli_fetch_array($query)) {
          echo '<option value="'.$valor[RellenoID].'">'.$valor[NombreRelleno].'</option>';
           $_COOKIE['total'] += $valor[CostoRelleno];
        }
      ?>
    </select>
    <select class="controls" aria-label="Default select example" id="FormaID" name="FormaID">
      <option selected>Forma</option>
      <?php 
        $query = $db -> query ("SELECT * FROM forma");
        while ($valor = mysqli_fetch_array($query)) {
          echo '<option value="'.$valor[FormaID].'">'.$valor[Tipo].'</option>';
          $_COOKIE['total'] += $valor[Costo];
        }
      ?>
    </form>

    
    <input class="controls" type="text" name="link" id="link" placeholder="Link de Imagen">
    <p id="CostoTotal"></p>
    <button type="submit" class="btn btn-primary btn-lg"style="padding-left: 2.5rem; padding-right: 2.5rem;" name="registerP">Registrar</button>
  </section>

    <script src="jQuery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
    <script src="javaScript/password.js"></script>
    </body>
</html>
