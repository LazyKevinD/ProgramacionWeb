<!--
    Funciones MYSQLi

    Funciones PDO
        Estas funciones permiten cambiar la conectividad a diversos GESTORES DE BD

-->

<?php

    class ConexionBDEscuela{

        private $conexion;
        private $host = "sql206.infinityfree.com:3306";
        private $usuario = "if0_37473083";
        private $password = "qSlX8IMq8n0";
        private $bd = "if0_37473083_escuela2024";

        public function __construct(){

            $this->conexion = mysqli_connect($this->host, $this->usuario, $this->password, $this->bd);

            if(!$this->conexion)

                die("Error en conexion a la BD:" . musqli_connect_error());


        }

        public function getConexion(){

            return $this->conexion;
            
        }

    }

?>