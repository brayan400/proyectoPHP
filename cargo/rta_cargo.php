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
            <td colspan="2">datos del cargo</td>
        </tr>
        <?php
        $myidcargo = $_POST['IDcargo'];

        $query = "select idcargo,nombrecargo from cargo where (idcargo=$myidcargo)";

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($idcargo, $nombrecargo);
            while ($stmt->fetch()) {
        ?>
                <tr id="info">
                    <td id="subtitulo">Codigo Cargo</td>
                    <td><?php printf("%s", $idcargo); ?></td>
                </tr>
                <tr id="info">
                    <td id="subtitulo">Nombre Cargo</td>
                    <td><?php printf("%s", $nombrecargo); ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr id="regresar">
            <td colspan="2">
                <a href="frm_consultacargo.php">volver</a>
            </td>
        </tr>
    </table>

</body>

</html>