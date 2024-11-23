<?php

include_once('../database/conexion_bd_escuela.php');

$con = new conexionBDEscuela();

$conexion = $con -> getConexion();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $cadenaJSON = file_get_contents('php://input');

    if($cadenaJSON == false){

        echo "No hay cadena JSON";

    }else{

        $datos_alumno = json_decode($cadenaJSON, true);

        $nc_c = $datos_alumno['nc_c'];
        $n_c = $datos_alumno['n_c'];
        $pa_c = $datos_alumno['pa_c'];
        $sa_c =  $datos_alumno['sa_c'];
        $e_c= $datos_alumno['e_c'];
        $s_c= $datos_alumno['s_c'];
        $c_c= $datos_alumno['c_c'];

        

        $dato_correctos = false;

        if (isset($nc_c, $n_c, $pa_c, $sa_c, $e_c, $s_c, $c_c) && 
        !empty($nc_c) && !empty($n_c) && !empty($pa_c) && !empty($sa_c) && !empty($e_c) &&
         !empty($s_c) && !empty($c_c) && is_numeric($nc_c) && is_numeric($e_c) && is_numeric($s_c)) {

        $dato_correctos=true;

        }

        if($dato_correctos){

            $sql = "UPDATE alumnos SET Nombre = '$n_c', Primer_Ap = '$pa_c', Segundo_Ap = '$sa_c', Edad = '$e_c', Semetres = '$s_c', Carrera = '$c_c' WHERE Num_Control = '$nc_c';";
            $res = mysqli_query($conexion, $sql);
            
            if($res){

                $respuesta['consulta'] = "exito";
                $respuesta['mensaje'] = "El registro con numero de control $nc_c fue modificado.";

            }else {

                $respuesta['consulta'] = "error";
                $respuesta['mensaje'] = "El registro no pudo ser modificado.";

            }
        }
    }

    echo json_encode($respuesta);

}

?>