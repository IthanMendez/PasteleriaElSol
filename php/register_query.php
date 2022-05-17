<?php
	session_start();
	include_once 'database\conexion.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();
 
	if(ISSET($_POST['register'])){
			try{
				$nombreCliente = $_POST['nombreCliente'];
				$correo = $_POST['correo'];
        // md5 encrypted
				$contrasena = md5($_POST['password']);
        $fechaIngreso = date('Y-m-d');
				
        $sql = "INSERT INTO cuenta (numCuenta, idFormaPago, correo, contrasena, nombreCliente, fechaIngreso, idDireccion)
                        VALUES (NULL, NULL, '$correo', '$contrasena', '$nombreCliente', '$fechaIngreso', NULL)";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			header('location:catalogo.php');
	}
?>