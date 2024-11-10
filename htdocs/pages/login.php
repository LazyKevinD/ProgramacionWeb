<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login y Registro</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
<form action = "../App_ABCC_Escuela/backend/controllers/validar_usuario.php" method = "POST">

    <!-- Encabezado -->
    <header>
        <nav>
            <div class="logo"><img src="../images/tutoria.png" alt="Logo Tutorías" height="200px"></div>
            <div class="header-content">
                <h1>Bienvenido, Inicia Sesion Para Continuar</h1>
            </div>
            <div class="nav-links">
                <button onclick="showLogin()">Login</button>
                <button onclick="showRegister()">Registro</button>
            </div>
        </nav>
    </header>

    <!-- Contenido de Login -->
    <div id="login" class="form-container">
        <div class="header-content">
            <h2>Login</h2>
        </div>
        <form>
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese el usuario" name = "caja_usuario">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la contraseña" name = "caja_password">
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

    <!-- Contenido de Registro -->
    <div id="register" class="form-container" style="display: none;">
        <div class="header-content">
            <h2>Registro</h2>
        </div>
        <form>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" placeholder="Introduce tu nombre">
            <label for="email">Email:</label>
            <input type="email" id="register-email" name="email" placeholder="Introduce tu email">
            <label for="password">Contraseña:</label>
            <input type="password" id="register-password" name="password" placeholder="Introduce tu contraseña">
            <label for="confirm-password">Confirmar Contraseña:</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirma tu contraseña">
            <button type="submit">Registrarse</button>
        </form>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 TecNM. Todos los derechos reservados.</p>
    </footer>

    <!-- JavaScript para cambiar entre Login y Registro -->
    <script>
        function showLogin() {
            document.getElementById('login').style.display = 'block';
            document.getElementById('register').style.display = 'none';
        }

        function showRegister() {
            document.getElementById('register').style.display = 'block';
            document.getElementById('login').style.display = 'none';
        }
    </script>
</form>
</body>
</html>
