<?php
require_once('../conex.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <table class="content-table">
        <tr id="titulos">
            <td colspan="2">AREAS</td>
            <td colspan="2">
                <a href="ingresoarea.php" style="text-decoration:none">Ingreso area</a>
            </td>
        </tr>
        <tr id="subtitulos">
            <td>Codigo</td>
            <td>Profesion</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
        <?php
        $query = "select*from area";

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($field1, $field2);
            while ($stmt->fetch()) {
        ?>
                <tr id="informacion">
                    <td><?php echo ($field1); ?></td>
                    <td><?php echo ($field2); ?></td>
                    <td><a href="editararea.php?id=<?php echo ($field1) ?>"><img src="../img/lapiz.png"></a></td>
                    <td><a href="borrararea.php?id=<?php echo ($field1) ?>"><img src="../img/papelera-de-reciclaje.png"></a></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr id="regresar">
            <td colspan="4"><a href="../index.php" style="text-decoration:none">volver</a></td>
        </tr>
    </table>
</body>

</html>