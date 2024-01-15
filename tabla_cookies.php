<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>tabla_cookies</title>
</head>
<body>

<?php 
require_once 'coockies.php';

    function mostrarTablaCookies() {
        if (!empty($_COOKIE)) {
            echo "<h3>Cookies creadas:</h3>";
            echo "<table class='table table-striped'>";
            echo "<tr><th>Nombre</th><th>Valor</th></tr>";
            foreach ($_COOKIE as $nombre => $valor) {
                echo "<tr><td>$nombre</td><td>$valor</td></tr>";
            }
            echo "</table>";
            echo "<form method='post' action='cookies.php'>";
            echo "<input type='submit' name='borrar_cookies' value='Borrar Cookies'>";
            echo "</form>";
        } else {
            echo "<p>No hay cookies creadas.</p>";
        }
    }
    
    mostrarTablaCookies();
    ?>

}
?>
    
</body>
</html>