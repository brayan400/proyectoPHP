<?php
require_once('../conex.php');
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
            <td colspan="7"> EMPLEADOS </td>
            <td colspan="2">
                <a href="ingresoempleado.php">
                    Ingreso empleado</a>
            </td>
        </tr>
        <tr>
            <td>Cedula</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>foto</td>
            <td>codigo cargo</td>
            <td>codigo profesion</td>
            <td>codigo area</td>
            <td>editar</td>
            <td>eliminar</td>
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
                    <td><img src="../img/<?php echo ($field4); ?>"></td>
                    <td><?php echo ($field5) ?></td>
                    <td><?php echo ($field6) ?></td>
                    <td><?php echo ($field7) ?></td>
                    <td><a href="editarempleado.php?id=<?php echo ($field1) ?>"><img src="../img/lapiz.png"></a></td>

                    <td><a href="borrarempleado.php?id=<?php echo ($field1) ?>"><img src="../img/papelera-de-reciclaje.png"></a></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr>
            <td colspan="9"><a href="../index.php"> Volver </a></td>
        </tr>
</body>

</html>