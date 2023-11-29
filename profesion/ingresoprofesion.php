<?php
require_once('../conex.php');
?>
<?php
if (isset($_POST['submit'])) {
    $nombreprofesion = strtoupper($_POST['nombreP']);

    $consultaprofesion = "SELECT*FROM profesion";
    $rta_profesion = mysqli_query($con, $consultaprofesion);
    $valor = mysqli_num_rows($rta_profesion);
    $valor++;
    $ingreso = "INSERT INTO profesion VALUES ($valor, '$nombreprofesion')";
    $rta_ingreso = mysqli_query($con, $ingreso);
    header("location:administrarprofesion.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form name="ingreso" method="post" action="">
        Nombre profesion
        <input type="text" name="nombreP">
        <input type="submit" value="ingresar" name="submit">
    </form>
    <a href="administrarprofesion.php">Regresar</a>

</body>

</html>