<?php
    $usuario = $_POST['caja_usuario'];
    $password = $_POST['caja_password'];
    $password1 = $_POST['confirm_caja_password'];

    if($password == $password1){
        include_once("../../database/conexion_bd_usuarios.php");

        $con = new ConexionBDUsuarios();
        $conexion = $con -> getConexion();

        if($conexion){

            $u_cifrado = sha1($usuario);
            $p_cifrado = sha1($password);

            $sql = "SELECT * FROM usuarios WHERE Nombre_Usuario = '$u_cifrado' AND Password = '$p_cifrado'";
            $res = mysqli_query($conexion, $sql);

            if(mysqli_num_rows($res)==1){
                header('location: ../pages/login.php?error=2');
            }else{
                $sql = "Insert into usuarios VALUES ('$u_cifrado', '$p_cifrado')";
                $res = mysqli_query($conexion, $sql);
                if($res){
                    session_start(); 
                    $_SESSION['valida'] = true;
                    $_SESSION['usuario'] = $usuario;
                    header('location: ../pages/menu_principal.php');
                }else{
                     echo "Error en la conexion";
                }
            }
        }else {
            echo "Error en la conexion";
        }
    }else{
        header('location: ../pages/login.php?error=3');
    }
?>
