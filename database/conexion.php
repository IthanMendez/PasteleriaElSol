<?php 
class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'pasteleria');
        define('usuario', 'root');
        define('password', '');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de conexión es: ". $e->getMessage());
        }
    }

    public static function ConectarSqli() {        				        
        try{
            $db = mysqli_connect(servidor,usuario,password,nombre_bd);
            return $db;
        }catch (Exception $e){
            die("El error de conexión es: ". $e->getMessage());
        }
    }

    public function getData(){
        $sql = "SELECT*FROM $this->tablename";

        $result = mysqli_query($this->conexion,$sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}
?>