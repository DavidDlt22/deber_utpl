<?php

require_once 'conexion.php';

class Curso_modelo{

    public static function mostrarCursos(){
        $conexion = Conexion::conectar();

        $mostrar = $conexion->prepare("SELECT * FROM curso_utpl");
        $mostrar -> execute();
        return $mostrar -> fetchAll();
    }

    public static function cursoCrear($datos){
        $conexion = Conexion::conectar();
        $crear = $conexion->prepare("INSERT INTO curso_utpl (curso_id, curso, descripcion) VALUES (NULL, :curso, :descripcion)");
        $crear -> bindParam(':curso' , $datos['curso'] , PDO::PARAM_STR);
        $crear -> bindParam(':descripcion' , $datos['descripcion'] , PDO::PARAM_STR);

        if($crear -> execute()){
            return 'ok';
        }else{
            return 'error';
        }
    }

   

}