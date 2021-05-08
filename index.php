<?php 
    require_once "./controller/ctr_persona.php";
    require_once "./controller/ctr_personaUpdate.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Tecnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/styles.css" media="screen" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="padding-form">

        <form class="row g-3" method="POST" id="formulario">
            <div class="col-md-4">
                <label for="nombreid" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreid" name="nombre" required>
            </div>

            <div class="col-md-4">
                <label for="apellidosid" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidosid" name="apellidos" required>
            </div>

            <div class="col-md-4">
                <label for="fechanacimientoid" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechanacimientoid" name="fecha_nacimiento" required>
            </div>

            <div class="col-md-4">
                <label for="sexoid" class="form-label">Sexo</label>
                <select class="form-select" aria-label="Default select example" name="sexo" id="sexoid" required>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Indefinido">Indefinido</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="estaturaid" class="form-label">Estatura</label>
                <input type="number" class="form-control" id="estaturaid" name="estatura" step="0.01" required>
            </div>

            <div class="col-md-4">
                <div class="form-check padding-check">
                    <input class="form-check-input" type="checkbox" id="colombianoid" name="colombiano">
                    <label class="form-check-label" for="colombianoid">
                        Colombiano?
                    </label>
                </div>
            </div>

            <div>
                <input type="hidden" id="idusuarioseleccionado" name="idusuarioseleccionado" value="0">
            </div>

            <div class="col-12">
                <button type="submit" id="button-crear" class="btn btn-success btn-right">Crear</button>
                <button type='button' onClick='eliminarPersona();' class='btn btn-danger'>Eliminar</button>
                <button type='button' onClick='actualizarPer();' class='btn btn-success'>Actualizar</button>
                <br>
            </div>

            <?php 
                $crearPersona = new PersonaController();
                $crearPersona->crear();
            ?>

        </form>
    </div>

    <div class="paddingtable">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Estatura</th>
                    <th scope="col">Colombiano</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $personas = new PersonaController();
                 $personas->index();
               ?>
            </tbody>
        </table>
    </div>

    <div class="contenedor-pie">
        <div class="col-md-8"></div>
        <div class="col-md-2">
            Numero de registros:
            <select class="form-select" aria-label="Default select example" name="filas" id="filas">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="1000">All</option>
            </select>
        </div>

        <div class="col-md-2 btn-paginacion">

            <button type="button" class="btn btn-outline-success btn-retroceder" onclick="paginacion(0)">
                < </button>
                    <button type="button" class="btn btn-outline-success btn-avanzar" onclick="paginacion(1)"> >
                    </button>
        </div>
    </div>

    <?php 
        $eliminarPersona = new PersonaController();
        $eliminarPersona->eliminarPersona();
    ?>


</body>
<!-- <script src="plugins/sweetalert2/sweetalert2.all.js"></script> -->
<script src="js/index.js">
</script>

</html>