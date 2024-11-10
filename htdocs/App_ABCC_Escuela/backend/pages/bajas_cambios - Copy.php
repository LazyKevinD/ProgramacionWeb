<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #041d05;
        }

        th {
            background-color: #776dfc;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        
        .actions a {
            background-color: #000;
            color: #fff;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .actions a:hover {
            background-color: #00fbff;
            color: #000;
        }

        h3 {
            display: inline-block;
            padding: 8px 15px;
            border: 2px solid #776dfc; /* Color morado */
            border-radius: 20px; /* Borde redondeado */
            background-color: #000; /* Fondo negro */
            color: #776dfc; /* Color del texto morado */
            font-weight: bold;
        }
        .form-container { display: none; } /* Ocultar formulario inicialmente */
    </style>
</head>
<body>

<?php require_once('menu_principal.php'); ?>

<div align="center"><h3>Listado de ALUMNOS</h3></div>

<div id="tabla-alumnos">
    <?php
    include('../controllers/controller_alumno.php');
    $alumnoDAO = new AlumnoDAO();
    $datos = $alumnoDAO->mostrarAlumnos('');
    $alumnos = [];

    if (mysqli_num_rows($datos) > 0) {
        echo '<table>';
        echo '<thead>
                <tr>
                    <th>Num. Control</th>
                    <th>Nombre</th>
                    <th>Primer Ap</th>
                    <th>Segundo Ap</th>
                    <th>Edad</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>';

        while ($fila = mysqli_fetch_assoc($datos)) {
            $alumnos[] = $fila;
            printf(
                "<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td class='actions'>
                        <a href='#'>Detalles</a>
                        <a href='#' onclick='mostrarFormulario(%s)'>Editar</a>
                        <a href='../controllers/procesar_bajas.php?nc=%s'>Eliminar</a>
                    </td>
                </tr>",
                $fila['Num_Control'],
                $fila['Nombre'],
                $fila['Primer_Ap'],
                $fila['Segundo_Ap'],
                $fila['Edad'],
                $fila['Semestre'],
                $fila['Carrera'],
                $fila['Num_Control'], // Para las funciones de los botones
                $fila['Num_Control'], 
                $fila['Num_Control']
            );
        }

        echo '</tbody></table>';
    } else {
        echo "<p style='text-align: center; color: #776dfc;'>Tabla vacía</p>";
    }
    ?>
</div>

<div class="form-container" id="formulario-editar">
    <h2>Editar Alumno</h2>
    <form action="../controllers/procesar_edicion.php" method="POST" class="row g-3">
         <div class="col-12">
            <label for="edit_nombre">No. Control:</label>
            <input type="text" class="form-control" id="caja_num_control" name="caja_num_control" readonly>
        </div>
        <div class="col-12">
            <label for="edit_nombre">Nombre:</label>
            <input type="text" class="form-control" id="caja_nombre" name="caja_nombre">
        </div>
        <div class="col-12">
            <label for="edit_primer_ap">Primer Apellido:</label>
            <input type="text" class="form-control" id="caja_primer_ap" name="caja_primer_ap">
        </div>
        <div class="col-12">
            <label for="edit_segundo_ap">Segundo Apellido:</label>
            <input type="text" class="form-control" id="caja_segundo_ap" name="caja_segundo_ap">
        </div>
        <div class="col-12">
            <label for="edit_edad">Edad:</label>
            <input type="text" class="form-control" id="caja_edad" name="caja_edad">
        </div>
        <div class="col-12">
            <label for="edit_semestre">Semestre:</label>
            <input type="text" class="form-control" id="caja_semestre" name="caja_semestre">
        </div>
        <div class="col-12">
            <label for="edit_carrera">Carrera:</label>
            <input type="text" class="form-control" id="caja_carrera" name="edit_carrera">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-secondary" onclick="ocultarFormulario()">Cancelar</button>
        </div>
    </form>
</div>


<script>
    const alumnos = <?php echo json_encode($alumnos); ?>;

    function mostrarFormulario(numControl) {
        document.getElementById('tabla-alumnos').style.display = 'none';
        document.getElementById('formulario-editar').style.display = 'block';

        const alumno = alumnos.find(alumno => alumno.Num_Control === numControl.toString());

        if (alumno) {
            document.getElementById('caja_num_control').value = alumno.Num_Control;
            document.getElementById('caja_nombre').value = alumno.Nombre;
            document.getElementById('caja_primer_ap').value = alumno.Primer_Ap;
            document.getElementById('caja_segundo_ap').value = alumno.Segundo_Ap;
            document.getElementById('caja_edad').value = alumno.Edad;
            document.getElementById('caja_semestre').value = alumno.Semestre;
            document.getElementById('caja_carrera').value = alumno.Carrera;
        }
    }

    function ocultarFormulario() {
        document.getElementById('formulario-editar').style.display = 'none';
        document.getElementById('tabla-alumnos').style.display = 'block';
    }
</script>
</script>

</body>
</html>
