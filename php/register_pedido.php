<?php
	session_start();
	include_once '..\database\conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();
 
	if(ISSET($_POST['registerP'])){
			try{

				$descripcion = $_POST['descripcion'];
				$saborID = $_POST['SaborID'];
				$RellenoID= $_POST['RellenoID'];
        $FormaID =  $_POST['FormaID'];
        $imgLink =  $_POST['imgLink'];
        $fecha = date('Y-m-d');
				
        $sql = "INSERT INTO pedido (idPedido, fecha, descripcion, montoPagar, montoPagado, montoRestante, numCuenta, idRelleno, idSabor, idForma, imgLink)
                        VALUES (NULL, '$fecha', '$descripcion', '400', '0', '400', '1', '$RellenoID', '$SaborID', '$FormaID', '$imgLink')";
                        echo $sql;
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			header('location:..\historial.php');
	}
?>