<?php
include_once 'database\conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
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
  <header>
  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Navbar</a>
    <form class="d-flex input-group w-auto">
      <input
        type="search"
        class="form-control rounded"
        placeholder="Search"
        aria-label="Search"
        aria-describedby="search-addon"
      />
      <span class="input-group-text border-0" id="search-addon">
        <i class="fas fa-search"></i>
      </span>
    </form>
  </div>
  </nav>
  </header>
  <body class="min-vh-100">
  <br>
    <h3 class="text-center text-light">
      Pedidos pendientes
    </h3>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <button type="button" class="btn btn-success" id="agregar" data-bs-toggle="modal">Agregar producto</button>
        </div>
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
                  <td>Jaime García</td>
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