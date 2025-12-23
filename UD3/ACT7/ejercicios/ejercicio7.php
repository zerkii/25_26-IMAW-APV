<?php
session_start();

// Si ya hay sesión, redirigir al juego
if (isset($_SESSION['nombre'])) {
    header("Location: juego.php");
    exit();
}

$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';

    if (!empty($nombre)) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['numero_secreto'] = rand(1, 100);
        $_SESSION['intentos'] = 5;
        header("Location: juego.php");
        exit();
    } else {
        $mensaje_error = "Por favor, introduce tu nombre.";
    }
}
?>

<!doctype html>
<html lang="es" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Juego Adivina el Número" />
    <title>Ejercicio 7 - Juego</title>
    <script src="../js/color-modes.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/propio.css">
    <style>
        .error {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: .25rem;
            margin-bottom: 15px;
        }
    </style>
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="..">Alex Pardo Vicente</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link" href="ejercicio1.php">ACT1 - Variables</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio2.php">ACT2 - Funciones y Clases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio3.php">ACT3 - Condicionales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio4.php">ACT4 - Iteracion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio5.php">ACT5 - Formularios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio6.php">ACT6 - Cookies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ejercicio7.php">ACT7 - Ejercicio Final</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="flex-shrink-0">
      <div class="container" style="padding-top: 70px;">
        <h1 class="mt-5">Ejercicio 7 - Juego Adivina el Número</h1>
        <section class="container">
          <article>
            <h3>Introduce tu nombre para empezar</h3>

            <?php if (!empty($mensaje_error)): ?>
                <p class="error"><?php echo $mensaje_error; ?></p>
            <?php endif; ?>

            <form action="ejercicio7.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre" required>
                </div>
                <button type="submit" class="btn btn-primary">Empezar Juego</button>
            </form>
          </article>
          <br><br>
        </section>
      </div>
    </main>
    <footer class="footer mt-auto py-3 bg-body-tertiary">
      <div class="container">
        <span class="text-body-secondary">IMAW - Ciudad Jardin</span>
      </div>
    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>
</html>
