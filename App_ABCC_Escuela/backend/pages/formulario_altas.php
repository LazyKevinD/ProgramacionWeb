<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../css/style.css"> 
</head>

<body>

    <?php require_once('menu_principal.php'); ?>

    <div class="form-container">
        <h2>Altas Alumnos</h2>

        <form action="../controllers/procesar_altas.php" method="POST" class="row g-3">
            <div class="col-12">
                <label for="caja_num_control">Número de Control:</label>
                <input type="text" class="form-control" id="caja_num_control" name="caja_num_control" placeholder="Ingrese solo números">
            </div>

            <div class="col-12">
                <label for="caja_nombre">Nombre:</label>
                <input type="text" class="form-control" id="caja_nombre" name="caja_nombre">
            </div>

            <div class="col-12">
                <label for="caja_primer_ap">Primer Apellido:</label>
                <input type="text" class="form-control" id="caja_primer_ap" name="caja_primer_ap">
            </div>

            <div class="col-12">
                <label for="caja_segundo_ap">Segundo Apellido:</label>
                <input type="text" class="form-control" id="caja_segundo_ap" name="caja_segundo_ap">
            </div>

            <div class="col-12">
                <label for="caja_edad">Edad:</label>
                <input type="text" class="form-control" id="caja_edad" name="caja_edad">
            </div>

            <div class="col-12">
                <label for="caja_semestre">Semestre:</label>
                <input type="text" class="form-control" id="caja_semestre" name="caja_semestre">
            </div>

            <div class="col-12">
                <label for="caja_carrera">Carrera:</label>
                <input type="text" class="form-control" id="caja_carrera" name="caja_carrera">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>

</body>
</html>
