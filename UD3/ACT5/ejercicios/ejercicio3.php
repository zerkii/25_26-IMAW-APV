<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Estructuras condicionales" />
    <title>Ejercicios 3 - Condicionales</title>
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
                <a class="nav-link" href="ejercicio1.php">ACT1 - Variables</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio2.php">ACT2 - Funciones y Clases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ejercicio3.php">ACT3 - Condicionales</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="flex-shrink-0">
      <div class="container">
        <h1 class="mt-5">3-Estructuras condicionales</h1>
        <section class="container">
          <article id="ejer3_1">
            <h3>Ejercicio 3.1</h3>
            <?php
              // Cambia estos valores para probar las tres ramas
              $a = 8;
              $b = 5;

              echo "a es $a y b es $b." . "<br>";

              if ($a > $b) {
                echo "a es mayor que b.";
              } elseif ($a < $b) {
                echo "a es menor que b.";
              } else {
                echo "Ambos números son iguales.";
              }
            ?>
          </article>

          <article id="ejer3_2">
            <h3>Ejercicio 3.2</h3>
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
          </article>

          <article id="ejer3_3">
            <h3>Ejercicio 3.3</h3>
            <?php
              $color = 'Rojo'; // Prueba con 'Rojo', 'Verde', 'Amarillo' o cualquier otro valor

              switch (strtolower($color)) {
                case 'rojo':
                  echo "Rojo es Gorria en Euskara y Red en Inglés";
                  break;
                case 'verde':
                  echo "Verde es Berdea en Euskara y Green en Inglés";
                  break;
                case 'amarillo':
                  echo "Amarillo es Horia en Euskara y Yellow en Inglés";
                  break;
                default:
                  echo "Lo siento, pero no conozco el color $color";
                  break;
              }
            ?>
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