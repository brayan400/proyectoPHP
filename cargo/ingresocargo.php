<?php
require_once('../conex.php');
?>
<?php
if (isset($_POST['submit'])) {
    $nombrecargo = strtoupper($_POST['nombreC']);

    $consultacargo = "SELECT*FROM cargo";
    $rta_cargos = mysqli_query($con, $consultacargo);
    $valor = mysqli_num_rows($rta_cargos);
    $valor++;
    $ingreso = "INSERT INTO cargo VALUES ($valor,'$nombrecargo')";
    $rta_ingreso = mysqli_query($con, $ingreso);
    header("location:administrarcargo.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <form name="ingreso" method="POST" action="">
        Nombre de cargo
        <input type="text" name="nombreC">
        <input type="submit" value="ingresar" name="submit">
    </form>
    <a href="administrarcargo.php">Regresar</a>

</body>

</html>