<?php
class Usuario_controlador {

    public static function ctr_iniciarSesion() {
        if (isset($_POST['correo']) && isset($_POST['password'])) {
            $correo = trim($_POST['correo']);
            $password = trim($_POST['password']);

            if (!empty($correo) && !empty($password)) {
                $respuesta = Usuario_modelo::mld_iniciarSesion($correo, $password);

                if (is_array($respuesta) && count($respuesta) > 0) {
                    session_start();
                    $_SESSION['id'] = $respuesta['usuId'];
                    $_SESSION['nombre'] = $respuesta['nombre'];
                    $_SESSION['apellido'] = $respuesta['apellido'];
                    $_SESSION['correo'] = $respuesta['correo'];

                    header("Location: principal.php");
                    exit;
                } else {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Acceso Denegado!</strong> Credenciales incorrectas.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            } else {
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Los campos están vacíos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
}
