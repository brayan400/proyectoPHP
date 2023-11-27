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
            <td colspan="7"> Empleados Registrados</td>
        </tr>
        <tr>
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Foto</td>
            <td>Codigo Cargo</td>
            <td>Codigo Profesion</td>
            <td>Codigo Area</td>
        </tr>
        <?php
        $query = "select * from empleado";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($field1, $field2, $field3, $field4, $field5, $field6, $field7);
            while ($stmt->fetch()) {
        ?>
                <tr>
                    <td><?php echo ($field1) ?></td>
                    <td><?php echo ($field2) ?></td>
                    <td><?php echo ($field3) ?></td>
                    <td><img src="./img/<?php echo ($field4); ?>"></td>
                    <td><?php echo ($field5) ?></td>
                    <td><?php echo ($field6) ?></td>
                    <td><?php echo ($field7) ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr>
            <td colspan="7"><a href="index.php"> Volver </a></td>
        </tr>
    </table>
</body>

</html>