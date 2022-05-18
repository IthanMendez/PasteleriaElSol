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
	<br>
	<main>
<!-- mostrar catalogo-->
  <section class="py-4 text-center container col-md-4">
    <select id="cat" class="form-select">
      <option selected>Seleccione una categoría</option>
      <option value="1">Sabores</option>
  <option value="2" selected>Rellenos</option>
    </select>
  </section>

  <div class="album py-5 bg-light" id="products">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
          $idCat= $_COOKIE['idCat'];
			
			 if($idCat=='2'){
          $sql = 'SELECT * FROM relleno';

			 $resultado = $conexion->prepare($sql);
          $resultado->execute();
          while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            component($row['NombreRelleno'], $row['CostoRelleno'], $row['imgLink'], $row['RellenoID']);

			 }
			}
			 elseif($idCat=='1'){
				$sql = 'SELECT * FROM sabor';

				$resultado = $conexion->prepare($sql);
          $resultado->execute();
          while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
            component($row['Nombre'], $row['Costo'], $row['imgLink'], $row['SaborID']);
			 }
          }
			
        ?>
      </div>
    </div>
  </div>
  <script src="jQuery/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datatables/datatables.min.js"></script>
    <script src="javascript/categorias.js"></script>
</main>
</body>
</html>
