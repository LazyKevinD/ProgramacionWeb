<?php

    include_once('../../database/conexion_bd_escuela.php');

    //Data Access Objet (DAO)
    class AlumnoDAO{

        private $conexion;

        public function __construct(){

            $this->conexion = new ConexionBDEscuela();

        }

        // =========== METODOS ABCC (CRUD) =================

        //---------------- Metodo ALTAS ------------------
        //public function agregarAlumno($alumno)
        public function agregarAlumno($nc, $n,$pa ,$sp ,$e ,$s ,$c ){

            $sql = "INSERT INTO alumnos VALUES ('$nc','$n','$pa' ,'$sp' ,'$e' ,'$s' ,'$c')";

            $res = mysqli_query($this->conexion->getConexion(), $sql);

            return $res;

        }
        //---------------- Metodo BAJAS ------------------
        public function eliminarAlumno($nc){
            $sql = "DELETE FROM alumnos WHERE Num_Control = '$nc'";
            $res = mysqli_query($this -> conexion -> getConexion(), $sql);
            return $res;
        }
        //---------------- Metodo CAMBIOS ------------------

        //---------------- Metodo CONSULTAS ------------------
        public function mostrarAlumnos($filtro){

            $sql = "SELECT * FROM alumnos";
            $res = mysqli_query($this -> conexion -> getConexion(), $sql);
            return $res;

        }

    }

?>