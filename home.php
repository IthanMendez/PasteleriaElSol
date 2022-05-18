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
    <link rel="stylesheet" href="stylecat.css" type="text/css">
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

  <body>
  
	<p align=center class="nav-link px-2 link-dark fs-1 fw-bold"> PASTELERIA EL SOL </p>
   <img src="img/sunlogo2.png"  width="20%" height="20%" class="rounded mx-auto d-block" alt="Responsive image">
   <p align=center class="nav-link px-2 link-dark fs-2 fw-bold"> Bienvenidos a la Pastelería El Sol </p>
   <p align=center class="nav-link px-2 link-dark fs-2 fw-bold"> Ven a conocer el sabor de un buen pastel hecho en casa </p>
<br>
   
  </body>

</html>
