<?php
require_once('conex.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area</title>
</head>

<body>
    <table border="1">
        <tr>
            <td colspan="2">Areas Registradas </td>
        </tr>
        <tr>
            <td> Codigo </td>
            <td> Area </td>
        </tr>

        <?php
        $query = "select *from area";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($field1, $field2);
            while ($stmt->fetch()) {
        ?>
                <tr>
                    <td><?php echo ($field1) ?></td>
                    <td><?php echo ($field2) ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr>
            <td colspan="2"><a href="index.php"> Volver </a></td>
        </tr>
    </table>
</body>

</html>