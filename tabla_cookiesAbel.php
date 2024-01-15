<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Formulario</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>


<?php
function crearCookie($name, $value, $time = null)
{
    // Si $time no es null y es un número positivo, se establece el tiempo de expiración
    if ($time !== null && is_numeric($time) && $time > 0) {
        setcookie($name, $value, time() + $time, '/');
    } else {
        setcookie($name, $value, 0, '/');
    }
}
function borrarCookie($name)
{
    setcookie($name, '', time() - 3600, '/');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    }
    if (!empty($_POST["value"])) {
        $value = $_POST["value"];
    }
    if (!empty($_POST["time"])) {
        $time = $_POST["time"];
    } else {
        $time = 0;
    }
    //Crear cookie
    if (isset($_POST["crear"])) {
        crearCookie($name, $value, $time);
    }

    //Borrar cookie
    if (isset($_POST["borrar"])) {
        borrarCookie($name);
    }
}

// Comprobamos si existen cookies


    if (count($_COOKIE) > 0) {
        echo "<h2>Tabla de cookies</h2>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Value</th></tr>";

        // Comprobamos cada cookie y enseñamos su nombre y su valor
        foreach ($_COOKIE as $name => $value) {
            echo "<tr><td>$name</td><td>$value</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay cookies";
    }

?>