<?php
include_once('../models/model_alumno.php');
include_once('../controllers/controller_alumno.php');

class Fachada_Alumno {
    private $alumnoDAO;

    public function __construct() {
        $this->alumnoDAO = new AlumnoDAO();
    }

    public function registrarAlumno($alumno) {
        return $this->alumnoDAO->agregarAlumno($alumno);
    }

    public function eliminarAlumno($alumno) {
        return $this->alumnoDAO->eliminarAlumno($alumno);
    }

    public function modificarAlumno($alumno) {
        return $this->alumnoDAO->modificarAlumno($alumno);
    }

    public function consultarAlumno($alumno) {
        return $this->alumnoDAO->consultarAlumno($alumno);
    }
}
?>
