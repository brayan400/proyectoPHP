<?php
require_once('conex.php');
?>
<?php
$id = $_GET['id'];
$consulta_por_empleado = "SELECT * FROM empleado WHERE (cedula='$id')";
$rta_consulta_por_empleado = mysqli_query($con, $consulta_por_empleado);
?>
<?php
//cambiar
if (isset($_POST['submit'])) {
    $cedula = $_POST['Cedula'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $foto = $_POST['Foto'];
    $modificarcedula = "UPDATE empleado SET cedula='$cedula',nombre='$nombre',apellido='$apellido',foto='$foto'
    WHERE empleado.cedula='$id'";
    $rta_modificar = mysqli_query($con, $modificarcedula);
    header("location:administrarempleado.php");
}
?>
<?php
//cambiar
if (isset($_POST['submit'])) {
    $codigocargo = $_POST['Codigocargo'];
    $codigoprofesion = $_POST['Codigoprofesion'];
    $codigoarea = $_POST['Codigoarea'];
    $modificarcargo = "UPDATE empleado SET codigocargo='$codigocargo',codigoprofesion='$codigoprofesion',codigoarea='$codigoarea'
    WHERE empleado.cedula='$id'";
    $rta_modificar = mysqli_query($con, $modificarcargo);
    header("location:administrarempleado.php");
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
    <form name="editar" method="post" action="">
        empleado<br><br>
        <?php
        $datos = mysqli_fetch_assoc($rta_consulta_por_empleado);
        ?>
        <input type="number" value="<?php echo ($datos['cedula']) ?>" name="Cedula" /><br><br>
        <input type="text" value="<?php echo ($datos['nombre']) ?>" name="Nombre" /><br><br>
        <input type="text" value="<?php echo ($datos['apellido']) ?>" name="Apellido" /><br><br>
        <input type="text" value="<?php echo ($datos['foto']) ?>" name="Foto" /><br><br>
        <select value="<?php echo ($datos['codigocargo']) ?>" name="Codigocargo">
            <?php
            $getcargos = "SELECT*FROM cargo";
            $getresultado = mysqli_query($con, $getcargos);
            while ($valoresC = mysqli_fetch_array($getresultado)) {

                $idC = $valoresC['idcargo'];
                $nombreC = $valoresC['nombrecargo'];
            ?>
                <option value="<?php echo $idC; ?>"><?php echo $nombreC; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <select value="<?php echo ($datos['codigoprofesion']) ?>" name="Codigoprofesion">
            <?php
            $getprofesiones = "SELECT*FROM profesion";
            $getprofesiones1 = mysqli_query($con, $getprofesiones);
            while ($valorP = mysqli_fetch_array($getprofesiones1)) {

                $idP = $valorP['idprofesion'];
                $nombreP = $valorP['nombreprofesion'];
            ?>
                <option value="<?php echo $idP; ?>"><?php echo $nombreP; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <select value="<?php echo ($datos['codigoarea']) ?>" name="Codigoarea">
            <?php
            $getareas = "SELECT*FROM area";
            $getareas1 = mysqli_query($con, $getareas);
            while ($valorA = mysqli_fetch_array($getareas1)) {
                $idA = $valorA['idarea'];
                $nombreA = $valorA['nombrearea'];
            ?>
                <option value="<?php echo $idA; ?>"><?php echo $nombreA; ?></option>
            <?php
            }
            ?>
            <input type="submit" value="editar" name="submit">
    </form>
    <a href="administrarempleado.php">Regresar</a>
</body>

</html>