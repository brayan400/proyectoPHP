<?php
require_once('../conex.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleconsulta.css">
    <title>Document</title>
</head>

<body>
    <table>
        <tr id="titulo">
            <td colspan="2">datos del empleado</td>
        </tr>
        <?php
        $mycedula = $_POST['cedula'];

        $query = "select empleado.cedula, empleado.apellido, empleado.nombre, empleado.foto, cargo.nombrecargo, profesion.nombreprofesion, area.nombrearea from empleado, cargo,area,profesion where ((cargo.idcargo=empleado.codigocargo) and  (profesion.idprofesion=empleado.codigoprofesion) and  (area.idarea=empleado.codigoarea) and (empleado.cedula=$mycedula))";


        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($cedula, $nombre, $apellido, $foto, $nombrecargo, $nombreprofesion, $nombrearea);

            while ($stmt->fetch()) {
        ?>
                <tr id="info">
                    <td id="subtitulo">Cedula</td>
                    <td><?php printf("%s", $cedula); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">nombre</td>
                    <td><?php printf("%s", $nombre); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">apellido</td>
                    <td><?php printf("%s", $apellido); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">foto</td>
                    <td><img src="../img/<?php echo ($foto); ?>"></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">cargo</td>
                    <td><?php printf("%s", $nombrecargo); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">nombrearea</td>
                    <td><?php printf("%s", $nombrearea); ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }

        ?>
        <tr id="regresar">
            <td colspan="2">
                <a href="frm_consultaempleado.php">volver</a>
            </td>
        </tr>
    </table>
</body>

</html>