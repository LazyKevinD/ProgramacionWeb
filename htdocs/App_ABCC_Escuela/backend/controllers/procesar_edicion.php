<?php

include_once ('controller_alumno.php');

//1.-Obtener informacion de las cajas
$num_control = $_POST['caja_num_control'];
$nombre = $_POST['caja_nombre'];
$primer_ap = $_POST['caja_primer_ap'];
$segundo_ap = $_POST['caja_segundo_ap'];
$edad = $_POST['caja_edad'];
$semestre = $_POST['caja_semestre'];
$carrera = $_POST['caja_carrera'];


//2.-Validar la informacion
$dato_correctos = false;

if (isset($num_control, $nombre, $primer_ap, $segundo_ap, $edad, $semestre, $carrera) && !empty($num_control) && !empty($nombre) && !empty($primer_ap) && !empty($segundo_ap) && !empty($edad) && !empty($semestre) && !empty($carrera) && is_numeric($num_control) && is_numeric($edad) && is_numeric($semestre)) {

    $dato_correctos=true;

}

//3.-mandarselos al controlador
if($dato_correctos){

    $alumnoDAO = new  AlumnoDAO();
    
    $res = $alumnoDAO -> cambiarAlumno($num_control, $nombre, $primer_ap, $segundo_ap, $edad, $semestre, $carrera);

    if($res)
        header('location: ../pages/bajas_cambios.php');
    else

        echo"Mejor me dedico a las redes =(";

}



?>