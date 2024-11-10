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
        public function agregarAlumno($nc, $n ,$pa ,$sa ,$e ,$s ,$c){

            $sql = "INSERT INTO alumnos VALUES ('$nc','$n','$pa' ,'$sa' ,'$e' ,'$s' ,'$c')";

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
        public function cambiarAlumno($nc, $n, $pa, $sa, $e, $s, $c){
            $sql = "UPDATE alumnos SET Nombre='$n', Primer_Ap = '$pa', Segundo_Ap = '$sa', Edad = '$e', Semestre = '$s', Carrera = '$c' WHERE Num_Control = '$nc'";
            $res = mysqli_query($this -> conexion -> getConexion(), $sql);
            return $res;
        }

        //---------------- Metodo CONSULTAS ------------------
        public function mostrarAlumnos($filtro){

            $sql = "SELECT * FROM alumnos$filtro ORDER BY `alumnos`.`Num_Control`";
            $res = mysqli_query($this -> conexion -> getConexion(), $sql);
            return $res;

        }

    }

?>