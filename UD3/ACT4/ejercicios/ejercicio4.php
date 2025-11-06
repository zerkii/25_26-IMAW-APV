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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ejercicio4.php">ACT4 - Iteracion</a>
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
            <h3>Ejercicio 4.1</h3>
            <?php
              $contador=1;
              $final=20;
              while ($contador<=$final)
                {echo $contador;
                if ($contador < $final) echo ", ";
                $contador++;
                }
            ?>
          </article>

          <article id="ejer3_2">
            <h3>Ejercicio 4.2</h3>
            <?php
              echo "<ul>";
              for ($num=1;$num<=15;$num++){
                echo "<li> $num </li>";
              }
              echo "</ul>";
            ?>
          </article>

          <article id="ejer3_3">
            <h3>Ejercicio 4.3</h3>
            <table class="table table-bordered text-center">
            <tr>
            <?php
            $dias = array ("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
            foreach ($dias as $dia) {
              echo "<th>$dia</th>";
            }
            ?>
            </tr>
            </table>
          </article>
          <article id="ejer4_4">
            <h3>Ejercicio 4.4</h3>
            <table class="table table-bordered text-center">
            <?php
            $numero=1;
            for ($columna=1; $columna<=8; $columna++)
              while($numero<=8){
              echo "<th>$numero</th>";
              $numero++;}
            ?>
            </table>
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