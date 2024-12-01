<?php


class Inscribirme_controlador{

    public static function inscribirmeCrear(){
        if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['curso']) && isset($_POST['id']) ){
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $curso = $_POST['curso'];
            $id = $_POST['id'];
            

            if(!empty($nombre) && !empty($correo) && !empty($curso) && !empty($id)){

                $datos = array(
                    'nombre' => $nombre,
                    'correo' => $correo,
                    'curso' => $curso,
                    'id' => $id
                );

                $crear = Inscribirme_modelo::inscribirmeCrear($datos);

                if($crear == 'ok'){
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Correcto!</strong> has inscrito a un compañero correctamente.
                            
                        </div>
                    ';
                }else{
                    echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> ocurrio un error.
                            
                        </div>
                    ';
                }
            }else{
                echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> los campos deben estar llenos.
                            
                        </div>
                    ';
            }
        }
    }
}