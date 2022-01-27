<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1> hola</h1>
        <?php
        $id = $_GET['id'];
        echo "<h1>".$id."</h1>";
        ?>
       <?php
                        $db_host="localhost";
                        $db_user="root";
                        $db_pass="";
                        $db_db="suarezbd";
                        $con=mysqli_connect($db_host,$db_user,$db_pass,$db_db);
                        $query="SELECT idarticulos,descripcion,caracteristicas,precio,imagen FROM articulos WHERE idarticulos=".$id.";";
                        $res=mysqli_query($con, $query);
                        while ($row=mysqli_fetch_assoc($res)) {
        ?>
        <p>producto: <?php echo $row['idarticulos'] ?></p>
        <?php
                            }
                            ?>
</body>
</html>