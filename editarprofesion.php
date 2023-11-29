<?php
require_once('conex.php');
?>
<?php
$id = $_GET['id'];
$consulta_por_profesion = "SELECT * FROM profesion WHERE (idprofesion=$id)";
$rta_consulta_por_profesion = mysqli_query($con, $consulta_por_profesion);
?>
<?php
if (isset($_POST['submit'])) {
    $nombreprofesion = strtoupper($_POST['NombreProfesoin']);
    $modificar = "UPDATE profesion SET nombreprofesion='$nombreprofesion'
    WHERE profesion.idprofesion='$id'";
    $rta_modificar = mysqli_query($con, $modificar);
    header("location:administrarprofesion.php");
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
        $dato = mysqli_fetch_assoc($rta_consulta_por_profesion);
        ?>
        <input type="text" value="<?php echo ($dato['nombreprofesion']) ?>" name="NombreProfesoin">
        <input type="submit" value="editar" name="submit">
    </form>
    <tr>
        <td>
            <a href="administrarprofesion.php">regresar</a>
        </td>
    </tr>
</body>

</html>