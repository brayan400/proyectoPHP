<?php
require_once('../conex.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleconsulta.css">
    <title>Consulta empleado</title>
</head>

<body>
    <table id="titulo">
        <tr>
            <td colspan="2">Profesiones Registradas </td>
        </tr>
        <tr id="subtitulo">
            <td> Codigo </td>
            <td> Profesion </td>
        </tr>

        <?php
        $query = "select *from profesion";
        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($field1, $field2);
            while ($stmt->fetch()) {
        ?>
                <tr id="info">
                    <td><?php echo ($field1) ?></td>
                    <td><?php echo ($field2) ?></td>
                </tr>
        <?php
            }
            $stmt->close();
        }
        ?>
        <tr id="regresar">
            <td colspan="2"><a href="../index.php"> Volver </a></td>
        </tr>
    </table>
</body>

</html>