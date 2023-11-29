<?php
require_once('conex.php');
?>
<?php
if (isset($_POST['submit'])) {
    $nombreprofesion = strtoupper($_POST['nombreA']);

    $consultaprofesion = "SELECT*FROM area";
    $rta_profesion = mysqli_query($con, $consultaprofesion);
    $valor = mysqli_num_rows($rta_profesion);
    $valor++;
    $ingreso = "INSERT INTO area VALUES ($valor,'$nombreprofesion')";
    $rta_ingreso = mysqli_query($con, $ingreso);
    header("location:administrararea.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="ingreso" method="post" action="">
        NOMBRE DE AREA
        <input type="text" name="nombreA">
        <input type="submit" value="ingresar" name="submit">
    </form>
    <a href="administrararea.php">Regresar</a>
</body>

</html>