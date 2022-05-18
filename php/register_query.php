<?php
	session_start();
	include_once '..\database\conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();
 
	if(ISSET($_POST['register'])){
			try{
				$nombreCliente = $_POST['nombreCliente'];
				$correo = $_POST['correo'];
				$contrasena = $_POST['contrasena'];
				$numTelefono = $_POST['numTelefono'];
				
        $sql = "INSERT INTO cuenta (numCuenta, correo, contrasena, nombreCliente, numTelefono, direccion)
                        VALUES (NULL, '$correo', '$contrasena', '$nombreCliente', '$numTelefono', NULL)";
												echo $sql;
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			header('location:..\login.php');
	}
?>