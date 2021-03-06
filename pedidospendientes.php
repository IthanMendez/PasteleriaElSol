<?php
session_start();
include_once 'database\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
require_once('./php/component.php');
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
  </head>
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
  <body class="min-vh-100">
  <br>
    <h3 class="text-center text-dark">
      Pedidos pendientes
    </h3>
    <br>
    <div class="container">
      <div class="row">
        
      </div>
    </div>
    <br>
  <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table id="tablaInventario" class="table table-light table-striped table-bordered table-condensed"
            style="width: 100%">
              <thead class="text-center">
                <tr>
                  <th scope="col"># Pedido</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Monto pagado</th>
                  <th>Monto restante</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                  <td>1</td>
                  <td>Diego Flores</td>
                  <td>10/21/22</td>
                  <td>600</td>
                  <td>1300</td>
                  <td>Pendiente</td>
                  <td></td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>Jaime Garc??a</td>
                  <td>07/12/22</td>
                  <td>0</td>
                  <td>700</td>
                  <td>Espera de pago</td>
                  <td></td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>Harina 3</td>
                  <td>Sabor Red Velvet</td>
                  <td>1</td>
                  <td>Harina</td>
                  <td></td>
              </tr>
              <tr>
                  <td>4</td>
                  <td>Fresas</td>
                  <td>Fresas congeladas</td>
                  <td>16</td>
                  <td>Relleno</td>
                  <td></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <script src="jQuery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
    <script src="javascript/datatb.js"></script>
  </body>
</html>
