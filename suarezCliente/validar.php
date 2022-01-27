<?php
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['contrasena'];
    session_start();
    $_SESSION['usuario']=$usuario;

    $conexion=mysqli_connect("localhost","root","","suarezbd");

    $consulta="SELECT *FROM usuario Where nombre='$usuario' and contrasena='$contrasena' and tipousuario_idtipousuario=2";
    $resultado=mysqli_query($conexion,$consulta);

    $filas=mysqli_num_rows($resultado);
    

    if($filas)
    {
        header("location:index.php?");
    }
    else
    {
        ?>
        <?php
        include("indexx.php");
        ?>
        <h1 class="bad"> error en la autentificacion</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);