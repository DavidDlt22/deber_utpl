<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    echo "Error: Usuario no autenticado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilos.css">
    <title>Principal</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #035d91"> <strong>UTPL</strong> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="principal.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrar.php">Registrar Curso</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaCursos.php">Ver Cursos Disponibles</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="inscribirme.php">Inscribirme a un Curso</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cerrar.php">Cerrar Sesion</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <h1 class="titulo">Inscribir amigos a un curso </h1>
    <br>
    <br>
    <br>
    <div class="container centrar">

        <form class="w-100" style="max-width: 400px;" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Inscriptor</label>
                <input type="text" class="form-control" id="exampleInputEmail1" disabled value="<?php echo $_SESSION['nombre'] .' '.$_SESSION['apellido'] ?>">
                <input type="hidden" name="id"  value="<?php echo $_SESSION['id'] ?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Correo</label>
                <input type="text" class="form-control" id="" name="correo">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Curso</label>
                <select class="form-select" name="curso" require aria-label="Default select example">
                    <option selected value="" disabled>Escoje un Curso</option>
                    <?php
                    require_once 'modelo/curso_modelo.php';
                    $respuesta = Curso_modelo::mostrarCursos();

                    foreach ($respuesta as $curso) {

                        echo '
                            <option value="'.$curso['curso_id'].'">'.$curso['curso'].'</option>
                        ';
                    }
                    ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Inscribir</button>
            <?php
            require_once 'controlador/inscribirme_controlador.php';
            require_once 'modelo/inscribirme_modelo.php';

            $crear = new Inscribirme_controlador();
            $crear-> inscribirmeCrear();


            ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>