<?php
require_once('../conex.php');
?>
<?php
$id = $_GET['id'];
$consulta_por_cargo = "SELECT * FROM cargo WHERE (idcargo=$id)";
$rta_consulta_por_cargo = mysqli_query($con, $consulta_por_cargo);
?>


<?php
//cambiar
if (isset($_POST['submit'])) {
    $nombrecargo = strtoupper($_POST['NombreCargo']);
    $modificar = "UPDATE cargo SET nombrecargo='$nombrecargo'
    WHERE cargo.idcargo='$id'";
    $rta_modificar = mysqli_query($con, $modificar);
    header("location:administrarcargo.php");
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
    <form name="edicion" method="post" action="">
        <?php
        $datos = mysqli_fetch_assoc($rta_consulta_por_cargo);
        ?>
        <input type="text" value="<?php echo ($datos['nombrecargo']) ?>" name="NombreCargo">
        <input type="submit" value="editar" name="submit">
    </form>
</body>

</html>