<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login admin</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    
    <script type="text/javascript" src="conexion/validacion.js"></script>

</head>
<body>
    
    <form action="validar.php" method="post" name="loginn" onsubmit="return ValidarLogin()">
    <h1>Acceso a Admin</h1>
    <p>usuario: <input type="text" placeholder="ingrese su nombre" name="usuario" id="usuario"></p> 
    <p>contrase&nacute;a: <input type="password" placeholder="ingrese su contraseña" name="contrasena" id="contrasena"></p>

   

    <input type="submit" value="ingresar">

    </form>
    
</body>
</html>