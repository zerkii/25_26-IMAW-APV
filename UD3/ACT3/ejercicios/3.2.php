<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Ejercicio 3.2 - Estado de la Bombilla" />
		<title>Ejercicio 3.2 - Estado de la Bombilla</title>
		<script src="../js/color-modes.js"></script>
		<link href="../css/bootstrap.min.css" rel="stylesheet" />
		<link href="../css/sticky-footer-navbar.css" rel="stylesheet" />
		<link rel="stylesheet" href="../css/propio.css">
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
								<a class="nav-link" href="../../ACT1">ACT1 - Variables</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../../ACT2">ACT2 - Funciones y Clases</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									ACT3 - Condicionales
								</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="3.1.php">3.1 - Comparación</a></li>
									<li><a class="dropdown-item active" href="3.2.php">3.2 - Bombilla</a></li>
									<li><a class="dropdown-item" href="3.3.php">3.3 - Colores</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<main class="flex-shrink-0">
			<div class="container">
				<h1 class="mt-5">3.2 - Estado de la Bombilla</h1>
				<section class="container">
					<?php
						// Usamos la clase Bombilla en recursos/bombilla.php
						require_once '../recursos/bombilla.php';

						$bombilla = new Bombilla();

						// Ejemplo: encendemos la bombilla. Cambia a $bombilla->apagar(); para probar la otra rama.
						$bombilla->encender();

						// Según el enunciado, mostramos textos concretos según el estado.
						if ($bombilla->getEncendida()) {
							// Si está encendida -> mostrar las líneas exactas indicadas para el caso "encendida"
							echo "La Bombilla está ahora apagada" . "<br>";
							echo "Apaga esa luz, que me deslumbras!!!";
						} else {
							// Si está apagada -> mostrar las líneas exactas indicadas para el caso "apagada"
							echo "La Bombilla está ahora encendida" . "<br>";
							echo "No veo nada, da la luz!!!";
						}
					?>
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
