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
    </style>
</head>
<body>

<?php
    require_once('menu_principal.php');
?>

<div align="center"><h3>Listado de ALUMNOS</h3></div>


<?php
    include('../controllers/controller_alumno.php');
    $alumnoDAO = new AlumnoDAO();

    $datos = $alumnoDAO->mostrarAlumnos('');

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
                        <a href='#'>Detalle</a>
                        <a href='#'>Editar</a>
                        <a href='../controllers/procesar_bajas.php?nc=%s'>Eliminar</a>
                    </td>
                </tr>",
                $fila['Num_Control'],
                $fila['Nombre'],
                $fila['Primer_Ap'],
                $fila['Segundo_Ap'],
                $fila['Edad'],
                $fila['Semetres'],
                $fila['Carrera'],
                $fila['Num_Control']
            );
        }

        echo '</tbody></table>';
    } else {
        echo "<p style='text-align: center; color: #776dfc;'>Tabla vacía</p>";
    }
?>

</body>
</html>
