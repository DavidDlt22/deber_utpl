<?php

require_once 'conexion.php';

class Inscribirme_modelo {
    public static function inscribirmeCrear($datos) {
        try {
            $conexion = Conexion::conectar();
            $crear = $conexion->prepare(
                "INSERT INTO inscripcion (insId, usuId, nombre, correo, cursoId) 
                 VALUES (NULL, :usuId, :nombre, :correo, :cursoId)"
            );
            $crear->bindParam(':usuId', $datos['id'], PDO::PARAM_INT);
            $crear->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $crear->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            $crear->bindParam(':cursoId', $datos['curso'], PDO::PARAM_INT); // Asegúrate de que cursoId sea un número entero

            if ($crear->execute()) {
                return 'ok';
            } else {
                return 'error';
            }
        } catch (PDOException $e) {
            die("Error en inscribirmeCrear: " . $e->getMessage());
        }
    }
}
