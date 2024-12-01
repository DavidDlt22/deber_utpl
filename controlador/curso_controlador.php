<?php


class Curso_controlador{

    public static function cursoCrear(){
        if(isset($_POST['curso']) || isset($_POST['descripcion']) ){
            $curso = $_POST['curso'];
            $descripcion = $_POST['descripcion'];
            

            if(!empty($curso) && !empty($descripcion)){

                $datos = array(
                    'curso' => $curso,
                    'descripcion' => $descripcion
                );

                $crear = Curso_modelo::cursoCrear($datos);

                if($crear == 'ok'){
                    echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Correcto!</strong> Curso creado.
                            
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