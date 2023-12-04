<?php
require_once('../conex.php');
?>
<?php
if (isset($_POST['submit'])) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $foto = $_POST['foto'];
    $codigocargo = $_POST['codigocargo'];
    $codigoprofesion = $_POST['codigoprofeiosn'];
    $codigoarea = $_POST['codigoarea'];

    $consultacargo = "SELECT*FROM empleado";
    $rta_cargos = mysqli_query($con, $consultacargo);
    $valor = mysqli_num_rows($rta_cargos);
    $valor++;
    $ingreso = "INSERT INTO empleado VALUES ('$cedula','$nombre','$apellido','$foto','$codigocargo','$codigoprofesion','$codigoarea')";
    $rta_ingreso = mysqli_query($con, $ingreso);
    header("location:administrarempleado.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registrar empleado</title>
</head>

<body>
    <form name="ingreso" method="POST" action="">
        empleado<br><br>
        <input type="number" placeholder="cedula" name="cedula" /><br><br>
        <input type="text" placeholder="nombre" name="nombre" /><br><br>
        <input type="text" placeholder="apellido" name="apellido" /><br><br>
        <input type="text" placeholder="foto" name="foto" /><br><br>
        <select name="codigocargo">
            <?php
            $getcargos = "SELECT*FROM cargo";
            $getresultado = mysqli_query($con, $getcargos);
            while ($valoresC = mysqli_fetch_array($getresultado)) {

                $id = $valoresC['idcargo'];
                $nombre = $valoresC['nombrecargo'];
            ?>
                <option value="<?php echo $id; ?>"><?php echo $id . " - " . $nombre; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <select name="codigoprofeiosn">
            <?php
            $getprofesiones = "SELECT*FROM profesion";
            $getprofesiones1 = mysqli_query($con, $getprofesiones);
            while ($valorP = mysqli_fetch_array($getprofesiones1)) {

                $id = $valorP['idprofesion'];
                $nombre = $valorP['nombreprofesion'];
            ?>
                <option value="<?php echo $id; ?>"><?php echo $id . " - " . $nombre; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <select name="codigoarea">
            <?php
            $getareas = "SELECT*FROM area";
            $getareas1 = mysqli_query($con, $getareas);
            while ($valorA = mysqli_fetch_array($getareas1)) {
                $id = $valorA['idarea'];
                $nombre = $valorA['nombrearea'];
            ?>
                <option value="<?php echo $id; ?>"><?php echo $id . " - " . $nombre; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" value="ingresar" name="submit" />
    </form>
    <a href="administrarempleado.php">Registrar</a>
</body>

</html>