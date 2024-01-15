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

                   <!-- <a href="register.php" class="btn btn-secondary btn-block mb-4"  role="button"
                        aria-disabled="true">Regístrese aquí</a>-->

                </form>

            </div>
        </div>
        <?php
        // Cogemos los valores del formulario y los guardamos en variables
        if (isset($_POST["cookieName"]) && ($_POST["cookieValue"])) {
            $cookieValue = $_POST["cookieValue"];
            $cookieName = $_POST["cookieName"];
            $cookieTime = $_POST["cookieTime"];
            if ($cookieTime == null) {
                $cookieTime = 0;}
        }
        function crearCookie($cookieValue,$cookieName,$cookieTime){
            setcookie($cookieName, $cookieValue, time() +$cookieTime);
        }
        if (isset($_POST["crearCookie"])) {
                crearCookie($cookieValue,$cookieName,$cookieTime);
            }
        
        ?>
        
</body>
</html>