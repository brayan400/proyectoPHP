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
            <td colspan="2">datos del area</td>
        </tr>
        <?php
        $myidarea = $_POST['IDarea'];

        $query = "select idarea,nombrearea from area where (idarea=$myidarea)";


        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($idarea, $nombrearea);

            while ($stmt->fetch()) {
        ?>
                <tr id="info">
                    <td id="subtitulo">Codigo Area</td>
                    <td><?php printf("%s", $idarea); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">Nombre Area</td>
                    <td><?php printf("%s", $nombrearea); ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }

        ?>
        <tr id="regresar">
            <td colspan="2">
                <a href="frm_consultaarea.php">volver</a>
            </td>
        </tr>
    </table>
</body>

</html>