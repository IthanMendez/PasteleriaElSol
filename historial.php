<?php
session_start();
include_once 'database\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$objeto2 = new Conexion();
$db = $objeto2->ConectarSqli();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 
  
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

  <br>
  <br>
<div class="container home">
  <br>
  <br>    
    <h3>Historial de pedidos</h3>
    <br>
    <br>
    <br> 
    <table id="data_table" class="table table-striped">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Nombre del Cliente</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>Monto pagado</th>   
                <th>Monto Restante</th>
                <th>Pago Total</th>
                <th>Relleno</th>
                <th>Sabro</th>
                <th>Forma</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql_query = "SELECT idPedido, pedido.numCuenta, nombreCliente, fecha, descripcion, montoPagado, montoRestante, montoPagar, nombreRelleno, Nombre, Tipo
            FROM pedido, cuenta, sabor, relleno, forma 
            WHERE pedido.numCuenta=cuenta.numCuenta AND sabor.SaborID=pedido.idSabor AND relleno.RellenoID=pedido.idRelleno AND pedido.idForma=forma.FormaID 
            ORDER BY fecha ASC" ;
            $resultset = mysqli_query($db, $sql_query) or die("error base de datos:". mysqli_error($db));
            while( $pasteleria = mysqli_fetch_assoc($resultset) ) {
            ?>
              <?php if($_SESSION['id_user'] == $pasteleria ['numCuenta']){?>
               <tr id="<?php echo $pasteleria ['idPedido']; ?>">
               <td><?php echo $pasteleria ['idPedido']; ?></td>
               <td><?php echo $pasteleria ['nombreCliente']; ?></td>
               <td><?php echo $pasteleria ['fecha']; ?></td>
               <td><?php echo $pasteleria ['descripcion']; ?></td>
               <td><?php echo "$", $pasteleria ['montoPagado']; ?></td>
               <td><?php echo "$", $pasteleria ['montoPagar']-$pasteleria ['montoPagado'] ?></td>   
               <td><?php echo "$", $pasteleria ['montoPagar']; ?></td>
               <td><?php echo $pasteleria ['nombreRelleno']; ?></td>
               <td><?php echo $pasteleria ['Nombre']; ?></td>
               <td><?php echo $pasteleria ['Tipo']; ?></td>
               </tr>
               <?php } ?>
            <?php } ?>
        </tbody>
    </table>    
</div>


    <script src="jQuery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
    <script src="javascript/datatb.js"></script>
    <script src="javascript/tabla_edit.js"></script>
  </body>
</html>
