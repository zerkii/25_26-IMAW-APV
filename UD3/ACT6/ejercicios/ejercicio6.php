<?php
session_start(); // Iniciamos la sesión para poder trabajar con variables de sesión

// --- LÓGICA DE SALIR (LOGOUT) ---
// Si el usuario pulsa "Salir", limpiamos todo
if (isset($_GET['accion']) && $_GET['accion'] == 'cerrar') {
    session_unset(); // Eliminar variables de sesión
    session_destroy(); // Destruir la sesión en el servidor
    
    // Borrar las cookies (las caducamos poniéndoles una fecha pasada)
    setcookie("usuario", "", time() - 3600);
    setcookie("tiempo", "", time() - 3600);
    
    // Redirigir a esta misma página limpia
    header("Location: ejercicio6.php");
    exit();
}

// --- LÓGICA DE REDIRECCIÓN AUTOMÁTICA ---
// Si ya hay sesión o existe la cookie de "recordar", vamos directo a noticias
if (isset($_SESSION['usuario']) || isset($_COOKIE['usuario'])) {
    // IMPORTANTE: Asegúrate de que el nombre del archivo de noticias es correcto (ejercicio_6noticias.php)
    header("Location: ejercicio_6noticias.php"); 
    exit();
}

// --- LÓGICA DEL FORMULARIO DE LOGIN ---
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Uso del operador de fusión de null (??) para evitar errores si las variables no están
    $usuario = $_POST['usuario'] ?? '';
    $clave = $_POST['clave'] ?? '';

    // Datos de referencia: Raul / 1234 
    if ($usuario === "Raul" && $clave === "1234") {
        
        // 1. Guardar usuario en la sesión
        $_SESSION['usuario'] = $usuario;

        // 2. Gestionar la cookie "tiempo" (inactividad de 1 minuto)
        setcookie("tiempo", "activo", time() + 60); 

        // 3. Si marcó "Recordarme", creamos la cookie "usuario" (dura 1 año)
        if (isset($_POST['recordarme'])) {
            setcookie("usuario", $usuario, time() + (365 * 24 * 60 * 60)); 
        }

        // Redirigir a la zona privada
        header("Location: ejercicio_6noticias.php");
        exit();

    } else {
        $mensaje_error = "El usuario o la clave introducidas no son correctas."; 
    }
}
?>

<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Ejercicios de Sesiones y Cookies" />
    <title>6-Sesiones y Cookies | Login</title>
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
                <a class="nav-link active" aria-current="page" href="ejercicio6.php">ACT6 - Cookies</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="flex-shrink-0">
      <div class="container" style="padding-top: 70px;">
        <h1 class="mt-5">6-Sesiones y Cookies</h1>
        <section class="container">
          <article id="ejer6_1">
            <h3>Ejercicio 6.1</h3>
            <h2>Sociedad gastronómica (Login)</h2>

            <!-- Mostrar el mensaje de error si existe -->
            <?php if (!empty($mensaje_error)): ?>
                <p class="error"><?php echo $mensaje_error; ?></p>
            <?php endif; ?>

            <!-- Formulario de login: el action apunta a sí mismo para procesar el POST -->
            <form action="ejercicio6.php" method="POST"> 
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Introduce el usuario" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave:</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Introduce la clave" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="recordarme" name="recordarme">
                    <label class="form-check-label" for="recordarme">Recordarme en siguientes sesiones</label>
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
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