<?php
require_once('conex.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
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
                <tr>
                    <td>Codigo Area</td>
                    <td><?php printf("%s", $idarea); ?></td>
                </tr>
                <tr>
                    <td>Nombre Area</td>
                    <td><?php printf("%s", $nombrearea); ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }

        ?>
        <tr>
            <td colspan="2">
                <a href="frm_consultaarea.php">volver</a>
            </td>
        </tr>
    </table>
</body>

</html>