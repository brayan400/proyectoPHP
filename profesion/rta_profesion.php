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
            <td colspan="2">Datos de Profeson</td>
        </tr>
        <?php
        $myidprofesion = $_POST['IDprofesion'];
        $query = "select idprofesion, nombreprofesion from profesion where (idprofesion=$myidprofesion)";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($idprofesion, $nombreprofesion);
            while ($stmt->fetch()) {
        ?>
                <tr id="info">
                    <td id="subtitulo">Codigo Profesion</td>
                    <td><?php printf("%s", $idprofesion); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">Nombre Profesion</td>
                    <td><?php printf("%s", $nombreprofesion); ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr id="regresar">
            <td colspan="2">
                <a href="frm_consultaprofesion.php">volver</a>
            </td>
        </tr>
    </table>
</body>

</html>