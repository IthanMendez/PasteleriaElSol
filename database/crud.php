<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$idCategoria = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : '';
$unidad = (isset($_POST['unidad'])) ? $_POST['unidad'] : '';
$nombreProducto = (isset($_POST['nombreProducto'])) ? $_POST['nombreProducto'] : '';
$img = (isset($_POST['img'])) ? $_POST['img'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idProducto = (isset($_POST['idProducto'])) ? $_POST['idProducto'] : '';


switch ($opcion) {
        case 1:
                if($idCategoria==1){
                  $sql = "INSERT INTO sabor (SaborID, Nombre, Costo, StockRestante, imgLink) 
                        VALUES (NULL, '$nombreProducto', '$precio', '$unidad', '$img')";
                  $resultado = $conexion->prepare($sql);
                  $resultado->execute();
                  $sql = "SELECT *
                  FROM sabor
                  ORDER BY SaborID DESC LIMIT 1";
                  $resultado = $conexion->prepare($sql);
                  $resultado->execute();
                  $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                }else{
                  $sql = "INSERT INTO relleno (RellenoID, NombreRelleno, CostoRelleno, StockRestante, imgLink) 
                        VALUES (NULL, '$nombreProducto', '$precio', '$unidad', '$img')";
                  $resultado = $conexion->prepare($sql);
                  $resultado->execute();
                  $sql = "SELECT *
                  FROM relleno
                  ORDER BY RellenoID DESC LIMIT 1";
                  $resultado = $conexion->prepare($sql);
                  $resultado->execute();
                  $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                }
                
                break;
        case 2:
                if($idCategoria==1){
                  $sql = "UPDATE sabor SET nombreProducto = '$nombreProducto', precio ='$precio', unidad = '$unidad', 
                  img ='$img'
                  WHERE sabor.SaborID = '$idProducto'";
                  $resultado = $conexion->prepare($sql);
                  $resultado->execute();
                  $sql = "SELECT *
                  FROM sabor 
                  WHERE sabor.SaborID = '$idProducto'";
                }else{
                  $sql = "UPDATE rellwno SET nombreProducto = '$nombreProducto', precio ='$precio', unidad = '$unidad', 
                  img ='$img'
                  WHERE relleno.RellenoID = '$idProducto'";
                  $resultado = $conexion->prepare($sql);
                  $resultado->execute();
                  $sql = "SELECT *
                  FROM relleno 
                  WHERE relleno.RellenoID = '$idProducto'";
                }
                
                
                $resultado = $conexion->prepare($sql);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                break;
        case 3:
                if($idCategoria==1){
                  $sql = "DELETE FROM sabor WHERE sabor.SaborID = '$idProducto'";
                }else{
                  $sql = "DELETE FROM relleno WHERE relleno.RellenoID = '$idProducto'";
                }
                
                $resultado = $conexion->prepare($sql);
                $resultado->execute();
                $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                break;
        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>