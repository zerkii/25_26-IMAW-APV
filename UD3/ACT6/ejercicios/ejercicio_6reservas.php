<?php
session_start();

// Duración del tiempo de inactividad (1 minuto = 60 segundos)
$TIEMPO_CADUCIDAD = 60;
$PAGINA_LOGIN = 'ejercicio6.php'; // Tu archivo de login
$PAGINA_NOTICIAS = 'ejercicio_6noticias.php';
$PAGINA_RESERVAS = 'ejercicio_6reservas.php'; 

// ===============================================
// LÓGICA DE CONTROL DE ACCESO (AUTENTICACIÓN)
// ===============================================

// 1. Si NO hay sesión activa, comprueba si existe la cookie 'usuario' (Recordarme)
if (!isset($_SESSION['usuario']) && isset($_COOKIE['usuario'])) {
    // Si existe, se restaura la sesión
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

// 2. Si AÚN NO hay sesión o cookie válida, redirigir al login
if (!isset($_SESSION['usuario'])) {
    header("Location: $PAGINA_LOGIN");
    exit();
}

// ===============================================
// LÓGICA DE CONTROL DE INACTIVIDAD (COOKIE TIEMPO)
// ===============================================

// 3. Comprueba la cookie 'tiempo'
if (!isset($_COOKIE['tiempo'])) {
    // Si la cookie tiempo no existe o ha caducado, la sesión se cierra y se redirige al login
    header("Location: $PAGINA_LOGIN?accion=cerrar");
    exit();
} else {
    // Si la cookie aún es válida, debe renovarse en cada interacción
    setcookie("tiempo", "activo", time() + $TIEMPO_CADUCIDAD);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservas - Sociedad Gastronómica</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet" />
    <style>
        .nav-link { color: white !important; }
        .bg-dark .nav-link.activo { background-color: #495057; border-radius: 5px; }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item me-3">
                        <span class="navbar-text text-light fw-bold">Usuario: <?php echo $_SESSION['usuario']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $PAGINA_NOTICIAS; ?>">Noticias Internas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activo" href="<?php echo $PAGINA_RESERVAS; ?>">Reservas</a>
                    </li>
                    <li class="nav-item ms-5">
                        <a class="nav-link" href="<?php echo $PAGINA_LOGIN; ?>?accion=cerrar">Salir</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="flex-shrink-0" style="padding-top: 70px;">
        <div class="container">
            <h1>6-Sesiones y Cookies</h1>
            <h2>Reservas</h2>
            <p>En esta página se hacen las reservas para la sociedad, no las quejas al cocinero!!</p>
            <p>Este es el contenido restringido de la sección de Reservas.</p>
        </div>
    </main>
</body>
</html>