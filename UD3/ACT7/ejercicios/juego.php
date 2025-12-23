<?php
session_start();

// Si no hay sesión, redirigir al inicio
if (!isset($_SESSION['nombre'])) {
    header("Location: ejercicio7.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$numero_secreto = $_SESSION['numero_secreto'];
$intentos = $_SESSION['intentos'];
$mensaje = "";
$fin_juego = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adivinanza = $_POST['adivinanza'] ?? '';

    if (is_numeric($adivinanza)) {
        $adivinanza = (int)$adivinanza;
        $intentos--;

        if ($adivinanza == $numero_secreto) {
            $mensaje = "¡Felicidades, $nombre! Has adivinado el número $numero_secreto.";
            $fin_juego = true;
        } elseif ($adivinanza < $numero_secreto) {
            $mensaje = "El número es mayor. Te quedan $intentos intentos.";
        } else {
            $mensaje = "El número es menor. Te quedan $intentos intentos.";
        }

        if ($intentos <= 0 && !$fin_juego) {
            $mensaje = "Lo siento, $nombre. Has perdido. El número era $numero_secreto.";
            $fin_juego = true;
        }

        $_SESSION['intentos'] = $intentos;
    } else {
        $mensaje = "Por favor, introduce un número válido.";
    }
}
?>

<!doctype html>
<html lang="es" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Juego Adivina el Número" />
    <title>Juego - Adivina el Número</title>
    <script src="../js/color-modes.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/propio.css">
    <style>
        .mensaje {
            padding: 10px;
            border-radius: .25rem;
            margin-bottom: 15px;
        }
        .success { color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; }
        .info { color: #0c5460; background-color: #d1ecf1; border: 1px solid #bee5eb; }
        .danger { color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; }
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
                <a class="nav-link active" aria-current="page" href="ejercicio7.php">ACT7 - Juego</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="flex-shrink-0">
      <div class="container" style="padding-top: 70px;">
        <h1 class="mt-5">Juego Adivina el Número</h1>
        <section class="container">
          <article>
            <h3>Hola, <?php echo $nombre; ?>!</h3>
            <p>Adivina un número entre 1 y 100. Tienes <?php echo $intentos; ?> intentos.</p>

            <?php if (!empty($mensaje)): ?>
                <p class="mensaje <?php echo $fin_juego ? ($intentos > 0 ? 'success' : 'danger') : 'info'; ?>"><?php echo $mensaje; ?></p>
            <?php endif; ?>

            <?php if (!$fin_juego): ?>
                <form action="juego.php" method="POST">
                    <div class="mb-3">
                        <label for="adivinanza" class="form-label">Tu adivinanza:</label>
                        <input type="number" class="form-control" id="adivinanza" name="adivinanza" min="1" max="100" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Adivinar</button>
                </form>
            <?php else: ?>
                <p><a href="juego.php?reiniciar=1" class="btn btn-secondary">Jugar de Nuevo</a> <a href="ejercicio7.php" class="btn btn-secondary">Volver al Inicio</a></p>
            <?php endif; ?>
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

<?php
// Reiniciar juego si se pulsa "Jugar de Nuevo"
if (isset($_GET['reiniciar'])) {
    session_unset();
    session_destroy();
    header("Location: ejercicio7.php");
    exit();
}
?>
