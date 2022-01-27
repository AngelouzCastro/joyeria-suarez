<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cabecera.css">
    <style>
        .ya {
            color: white;
            text-decoration: none;
        }
        .ya :hover {
            text-decoration: underline;
        }
     </style>   
</head>
<body>
    <form action="validar.php" method="post">
    <h1>Iiciar Sesi&oacute;n</h1>
    <p>usuario: <input type="text" placeholder="ingrese su nombre" name="usuario"></p> 
    <p>contrase&nacute;a: <input type="password" placeholder="ingrese su contraseña" name="contrasena"></p> 
    <input type="submit" value="ingresar">
    <br>
    <br>
    <a href="conexiones/singup.php" class="ya">Registrarme </a>
</body>
</html>