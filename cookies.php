<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Introduzca datos para crear una cookie</h1>

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6">
                <form method="post">
                    <div class="form-group mb-4 ">
                        <label class="form-label" for="cookieName">Cookie name</label>
                        <input type="text" id="cookieName" class="form-control" name="cookieName"  />

                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="cookieValue">Cookie value</label>
                        <input type="text" id="cookieValue" class="form-control" name="cookieValue"  />

                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="cookieTime">Cookie expiration seconds</label>
                        <input type="number" id="cookieTime" class="form-control" name="cookieTime" value ="0" min="0"  />

                    </div>
                    
                    <input type="submit" class="btn btn-primary btn-block mb-4" value="Añadir cookie" name ="crearCookie"></button>
                    <?php
                    // Mostrar el botón de borrar solo si existen cookies
                   // if (isset($_POST["cookieName"]) && isset($_COOKIE[$_POST["cookieName"]])) {
                   //     echo '<input type="submit" class="btn btn-danger btn-block mb-4" value="Borrar cookie" name="borrarCookie">';
                    //}
                    ?>
                </form>
            </div>
        </div>
        <?php
        require_once "tabla_cookies.php";

        // Cogemos los valores del formulario y los guardamos en variables
        if (isset($_POST["cookieName"]) && ($_POST["cookieValue"])) {
            $cookieValue = $_POST["cookieValue"];
            $cookieName = $_POST["cookieName"];
            $cookieTime = $_POST["cookieTime"];
            if ($cookieTime = null) {
                $cookieTime == 0;}
        }
        // funciones para crear y borrar cookies
        function crearCookie($cookieValue,$cookieName,$cookieTime){
            if ($cookieTime == 0 ) {
                setcookie($cookieName, $cookieValue, 0);
            } else {
                setcookie($cookieName, $cookieValue, time() +$cookieTime);
            }
        }
        function borrarCookie($cookieName)
        {
            setcookie($cookieName, false, time() -3600);
        }
        //Operaciones Crear o Borrar cookie
        if (isset($_POST["crearCookie"])) {
                crearCookie($cookieValue,$cookieName,$cookieTime);
                 // Redireccionar para que se actualice la página y se muestre la tabla
                header("Location: cookies.php");
                exit();
            }
        if (isset($_POST["borrarCookie"]) && ($_POST["cookieName"])) {
                borrarCookie($_POST["cookieName"] );
                unset($_COOKIE[$_POST["cookieName"]]);
            }
        //Mostramos la tabla de cookies
        mostrarTablaCookies();
        ?>
        
</body>
</html>