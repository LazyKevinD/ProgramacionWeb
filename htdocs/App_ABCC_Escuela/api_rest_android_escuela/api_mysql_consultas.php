<?php

    include_once('../database/conexion_bd_escuela.php');

    $con = new conexionBDEscuela();

    $conexion = $con -> getConexion();

    //var_dump($conexion);

    //METODOS HTTP DE PETICION: POST, GET, PUT, PATCH, DELETE
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        //recibir la PETICION (REQUEST) con JSON a travez de HTTP
        $cadenaJSON = file_get_contents('php://input');//Extraer la cadena JSON de la peticion

        if($cadenaJSON == false){

            echo "No hay cadena JSON";

        }else{
            
            $consulta_filtros = json_decode($cadenaJSON, true); // se carga la cadena JSON que viene desde los datos de android

            $f_nc = $consulta_filtros['f_nc'];
            $f_n = $consulta_filtros['f_n'];
            $f_pa = $consulta_filtros['f_pa'];
            $f_sa = $consulta_filtros['f_sa'];
            $f_e = $consulta_filtros['f_e'];
            $f_s = $consulta_filtros['f_s'];
            $f_c = $consulta_filtros['f_c'];

            //insercion directa del modelo DAO solo Num_Control
            $sql = "SELECT * FROM alumnos where 1=1";
            if(!$f_nc==""){
                $sql = $sql.=" and Num_Control = '$f_nc'";
            }
            if(!$f_n==""){
                $sql = $sql.=" and Nombre = '$f_n'";
            }
            if(!$f_pa==""){
                $sql = $sql.=" and Primer_Ap = '$f_pa'";
            }
            if(!$f_sa==""){
                $sql = $sql.=" and Segundo_Ap = '$f_sa'";
            }
            if(!$f_e==""){
                $sql = $sql.=" and Edad = '$f_e'";
            }
            if(!$f_s==""){
                $sql = $sql.=" and Semetres = '$f_s'";
            }
            if(!$f_c==""){
                $sql = $sql.=" and Carrera = '$f_c'";
            }
            $res = mysqli_query($conexion, $sql);

            //configurar RESPUESTA JSON (RESPONSE)
            $respuesta['alumnos'] = array();

            if($res){

                while($fila = mysqli_fetch_assoc($res)){
                    $alumno = array();
                    $alumno['nc'] = $fila['Num_Control'];
                    $alumno['n'] = $fila['Nombre'];
                    $alumno['pa'] = $fila['Primer_Ap'];
                    $alumno['sa'] = $fila['Segundo_Ap'];
                    $alumno['e'] = $fila['Edad'];
                    $alumno['s'] = $fila['Semetres'];
                    $alumno['c'] = $fila['Carrera'];
                    array_push($respuesta['alumnos'], $alumno);
                }

                $respuesta['consulta'] = 'exito';
                
            }else{
                $respuesta['consulta'] = 'no hay regisro';
                    
            }

            $respuestaJSON = json_encode($respuesta);

            echo $respuestaJSON;

        }

    }

?>