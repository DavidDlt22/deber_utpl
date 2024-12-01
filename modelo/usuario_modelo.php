<?php

require_once 'conexion.php';

class Usuario_modelo{

    public static function mld_iniciarSesion($correo , $password){

        $conexion = Conexion::conectar();
        $iniciar = $conexion->prepare("SELECT * FROM usuario_uptl WHERE correo = :correo AND password = :password");
        
        $iniciar -> bindParam(':correo' , $correo , PDO::PARAM_STR);
        $iniciar -> bindParam(':password' , $password , PDO::PARAM_STR);
        $iniciar -> execute();
        return $iniciar->fetch(PDO::FETCH_ASSOC);
    }

      
} 
