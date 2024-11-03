<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../css/style.css"> 
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background: linear-gradient(to bottom, rgb(0, 0, 255), #776dfc);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: white; font-weight: bold;">ALUMNOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-links">
        <li class="nav-item">
          <a class="nav-link active" href="formulario_altas.php" style="background-color: #000000; color: #ffffff; padding: 10px 15px; border-radius: 20px; font-weight: bold; transition: background-color 0.3s ease;">AGREGAR</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bajas_cambios.php" style="background-color: #000000; color: #ffffff; padding: 10px 15px; border-radius: 20px; font-weight: bold; transition: background-color 0.3s ease;">Eliminar/Modificar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #000000; color: #ffffff; padding: 10px 15px; border-radius: 20px; font-weight: bold; transition: background-color 0.3s ease;">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true" style="background-color: #000000; color: #ffffff; padding: 10px 15px; border-radius: 20px; font-weight: bold; transition: background-color 0.3s ease;">Disabled</a>
        </li>
      </ul>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px;">
        <button class="btn btn-outline-success" type="submit" style="background-color: #00fbff; color: #000; border-radius: 20px; font-weight: bold; transition: background-color 0.3s ease;">Search</button>
      </form>
    </div>
  </div>
</nav>

</body>
</html>
