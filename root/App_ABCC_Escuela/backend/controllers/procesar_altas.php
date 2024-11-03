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

if(isset($num_control, $nombre) && !empty($num_control) && is_numeric($num_control)){

    $dato_correctos=true;

}

//3.-mandarselos al controlador
if($dato_correctos){

    $alumnoDAO = new  AlumnoDAO();
    
    $res = $alumnoDAO -> agregarAlumno($num_control, $nombre, $primer_ap, $segundo_ap, $edad, $semestre, $carrera);

    if($res)

        echo"Registro Agregado Correctamente";

    else

        echo"Mejor me dedico a las redes =(";

}



?>