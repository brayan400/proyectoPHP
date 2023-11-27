<?php
require_once('conex.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo</title>
</head>

<body>

    <table border="1">
        <tr>
            <td colspan="2"> CARGOS </td>
            <td colspan="2">
                <a href="ingresocargo.php">Ingreso cargo</a>
            </td>
        </tr>
        <tr>
            <td>Codigo</td>
            <td>Nombre</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
        <?php
        $query = "select *from cargo";


        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($field1, $field2);
            while ($stmt->fetch()) {
        ?>
                <tr>
                    <td><?php echo ($field1); ?></td>
                    <td><?php echo ($field2); ?></td>
                    <td><a href="editarcargo.php?id=<?php echo ($field1) ?>"><img src="./img/lapiz.png"></a></td>

                    <td><a href="borrarcargo.php?id=<?php echo ($field1) ?>"><img src="./img/papelera-de-reciclaje.png"></a></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr>
            <td colspan="4">
                <tdan="4"><a href="index.php"> Volver </a>
            </td>
        </tr>
</body>

</html>