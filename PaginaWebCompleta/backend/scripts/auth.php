<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$tiempo_inactividad = 1000; 

// Verificar si existe 'ultima_actividad' en la sesión
if (isset($_SESSION['ultima_actividad'])) {
    $tiempo_transcurrido = time() - $_SESSION['ultima_actividad'];
    if ($tiempo_transcurrido > $tiempo_inactividad) {
        // Destruir la sesión y redirigir al login
        session_unset();
        session_destroy();
        header("Location: ../../frontend/pages/login.php?mensaje=sesion_expirada");
        exit();
    }
}

// Actualizar el tiempo de la última actividad
$_SESSION['ultima_actividad'] = time();

// Inicia la sesión solo si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lista de páginas públicas
$paginas_publicas = ['login.php', 'index.php', 'registro.php'];

// Obtén el nombre del archivo actual
$archivo_actual = basename($_SERVER['PHP_SELF']);

// Verifica si la sesión no está activa y no es una página pública
if (!in_array($archivo_actual, $paginas_publicas) && empty($_SESSION['usuario_id'])) {
    // Redirige al login con ruta absoluta para evitar errores
    header("Location: ../../frontend/pages/login.php");
    exit();
}
?>
