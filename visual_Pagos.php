<?php
session_start();
include_once 'database\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$objeto2 = new Conexion();
$db = $objeto2->ConectarSqli();
?>
<!doctype html>
<html lang="en">
  <head> 
    
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#" />
    <title>Inventario</title>
    <!-- Otros -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
  </head>
  
  <body class="min-vh-100">

  <header class="p-3 mb-3 border-bottom">
    
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" >
      
    <a href="catalogo.php">
      <img src="img/sunlogo2.png"  width="30%" height="40%" class="rounded mx-auto d-block" alt="Responsive image">
    </a>
    
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
      
        <li><a href="#" class="nav-link px-2 link-primary fs-4 fw-bold" >Inicio</a></li>
        <li><a href="catalogo.php" class="nav-link px-2 link-dark fs-4 fw-bold">Catalogo</a></li>
      
      
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

  <body class="min-vh-100">
  <div class="container home">    
    <br>
    <br>
    <h3>Pagos Realizados</h3>
    <br>
    <br>

  <div class="main-container">
  <table id="my_table" class="table table-striped" >
        <thead>
            <tr>
                <th>Orden ID</th>
                <th>Nombre</th>
                <th>Fecha en que se realizo el pedido</th>
                <th>Pagado</th>
                <th>Pendiente</th>
                <th>Total</th>
                <th>Estado</th>   
            </tr>
        </thead>
        <tbody>
        <?php 
            $sql_query = "SELECT idPedido, nombreCliente, fecha, montoPagado, montoRestante, montoPagar  
            FROM pedido, cuenta WHERE pedido.numCuenta=cuenta.numCuenta";
            $resultset = mysqli_query($db, $sql_query) or die("error base de datos:". mysqli_error($db));
            while( $pasteleria = mysqli_fetch_assoc($resultset) ) {
            ?>
               <tr id="<?php echo $pasteleria ['idPedido']; ?>">
               <td><?php echo $pasteleria ['idPedido']; ?></td>
               <td><?php echo $pasteleria ['nombreCliente']; ?></td>
               <td><?php echo $pasteleria ['fecha']; ?></td>
               <td><?php echo "$", $pasteleria ['montoPagado']; ?></td>
               <td><?php echo "$", $pasteleria ['montoPagar']-$pasteleria ['montoPagado'] ?></td>   
               <td><?php echo "$", $pasteleria ['montoPagar']; ?></td>
               <td>
                   <?php 
                    if( $pasteleria ['montoPagado']>=(floor($pasteleria ['montoPagar']/2))){echo "Pago Pendiente";}
                    elseif($pasteleria ['montoPagado']<(floor($pasteleria ['montoPagar']/2))){echo "Espera de Pago";} 
                    elseif($pasteleria ['montoPagado']==(floor($pasteleria ['montoPagar']/2))){echo "Aceptado";} 
                   ?>
               </td>  
               </tr>
            <?php } ?>
        </tbody>
    </table>    
</div>
</div>

    
    <script src="jQuery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
  </body>
</html>
