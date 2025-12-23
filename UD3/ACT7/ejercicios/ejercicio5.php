<?php
$logged_in = false;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])) {
    $usuario = htmlspecialchars($_POST['usuario']);
    $clave = htmlspecialchars($_POST['clave']);
    if ($usuario == 'imaw' && $clave == '1234') {
        $login_message = "Acceso permitido. Bienvenido!";
        $message_class = "text-success";
        $show_button = true;
        $logged_in = true;
    } else {
        $login_message = "Credenciales inválidas.";
        $message_class = "text-danger";
        $show_button = false;
    }
}
?>
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
            <ul  class="navbar-nav me-auto mb-2 mb-md-0">
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
                <a class="nav-link active" aria-current="page" href="ejercicio5.php">ACT5 - Formularios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio6.php">ACT6 - Cookies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ejercicio7.php">ACT7 - Ejercicio Final</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main class="flex-shrink-0">
      <div class="container">
        <h1 class="mt-5">5-Formularios</h1>
        <section class="container">
          <article id="ejer5_1">
            <h3>Ejercicio 5.1</h3>
            <h1>Inicio de Sesión</h1>
            <?php if (isset($login_message)) echo "<p class=\"$message_class\">$login_message</p>"; ?>
            <?php if (isset($show_button) && $show_button) echo '<a href=".." class="btn btn-primary">Volver al primer archivo PHP</a>'; ?>
            <?php if (!$logged_in): ?>
            <form method="POST">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required><br><br>
                <label for="clave">Clave:</label>
                <input type="password" id="clave" name="clave" required><br><br>
                <button type="submit">Enviar</button>
            </form>
            <?php endif; ?>
          </article>

          <article id="ejer5_2">
            <h3>Ejercicio 5.2</h3>
            <?php
            $num1 = isset($_POST['num1']) ? $_POST['num1'] : '';
            $num2 = isset($_POST['num2']) ? $_POST['num2'] : '';
            $operation = isset($_POST['operation']) ? $_POST['operation'] : '';
            $result = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = (float) $num1;
                $num2 = (float) $num2;

                switch ($operation) {
                    case '+':
                        $result = $num1 + $num2;
                        break;
                    case '-':
                        $result = $num1 - $num2;
                        break;
                    case '*':
                        $result = $num1 * $num2;
                        break;
                    case '/':
                        if ($num2 == 0) {
                            $result = 'No se puede dividir entre 0';
                        } else {
                            $result = $num1 / $num2;
                        }
                        break;
                }
            }
            ?>
            <form method="POST">
                <label for="num1">Número 1:</label>
                <input type="number" id="num1" name="num1" value="<?php echo htmlspecialchars($num1); ?>" step="any"><br><br>

                <label for="num2">Número 2:</label>
                <input type="number" id="num2" name="num2" value="<?php echo htmlspecialchars($num2); ?>" step="any"><br><br>

                <label>Operación:</label><br>
                <input type="radio" id="sum" name="operation" value="+" <?php if ($operation == '+') echo 'checked'; ?>>
                <label for="sum">+</label><br>
                <input type="radio" id="sub" name="operation" value="-" <?php if ($operation == '-') echo 'checked'; ?>>
                <label for="sub">-</label><br>
                <input type="radio" id="mul" name="operation" value="*" <?php if ($operation == '*') echo 'checked'; ?>>
                <label for="mul">*</label><br>
                <input type="radio" id="div" name="operation" value="/" <?php if ($operation == '/') echo 'checked'; ?>>
                <label for="div">/</label><br><br>

                <button type="submit">Calcular</button><br><br>

                <label for="result">Resultado:</label>
                <input type="text" id="result" name="result" value="<?php echo htmlspecialchars($result); ?>" readonly>
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