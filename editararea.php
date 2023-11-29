<?php
require_once('conex.php');
?>
<?php
$id = $_GET['id'];
$consulta_por_area = "SELECT * FROM area WHERE (idarea='$id')";
$rta_consulta_por_area = mysqli_query($con, $consulta_por_area);
?>

<?php
if (isset($_POST['submit'])) {
    $nombrearea = strtoupper($_POST['NombreArea']);
    $modificar = "UPDATE area SET nombrearea='$nombrearea'
    WHERE area.idarea='$id'";
    $rta_modificar = mysqli_query($con, $modificar);
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
    <form name="edicion" method="post" action="">
        <?php
        $datos = mysqli_fetch_assoc($rta_consulta_por_area);
        ?>
        <input type="text" value="<?php echo ($datos['nombrearea']) ?>" name="NombreArea">
        <input type="submit" value="editar" name="submit">
    </form>
</body>

</html>