<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>tabla cookies</title>
</head>
<body>

<?php 

//var_dump($_POST);
//var_dump($_COOKIE);

    function mostrarTablaCookies() {
        if (!empty($_COOKIE) && !isset($_POST['borrarCookies'])) {
            echo "<h3>Cookies creadas:</h3>";
            echo "<table class='table table-striped'>";
            echo "<tr><th>Nombre</th><th>Valor</th></tr>";
            foreach ($_COOKIE as $nombre => $valor) {
                echo "<tr><td>$nombre</td><td>$valor</td></tr>";
            }
            echo "</table>";
            echo "<form method='post' action='cookies.php'>";
            echo "<input type='submit' class='btn btn-danger btn-block mb-4' name='borrarCookies' value='Borrar Cookies'>";
            echo "</form>";
        } else {
            echo "<p>No hay cookies creadas.</p>";
        }
    }


    if (isset($_POST['borrarCookies'])) {
        foreach ($_COOKIE as $key => $value) {
            setcookie($key, '', time() - 1);
        }

    }

?>
    
</body>
</html>