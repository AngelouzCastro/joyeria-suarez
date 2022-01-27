<!DOCTYPE html>
<html lang="en">
    <body>
    <?php
        if(!isset($_POST['clave'])){
    ?>
    <form method="POST" action="login.php">
        Contrase&ntilde;a <input type="password" name="clave">
        <input type="submit" value="Registrar">
    </form>
    <?php        
        } else {
            $clave = $_POST['clave'];
            echo MD5($clave);
        }
    ?>
    </body>
</html>