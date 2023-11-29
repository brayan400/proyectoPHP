<?php
require_once('conex.php');
?>
<?php
$id = $_GET['id'];
$sql = "delete from area where idarea='" . $id . "'";
$resultado = mysqli_query($con, $sql);

if ($resultado) {
    echo "<script languaje='JavaScript'> 
    alert('los datos se eliminaron correctamende de base de datos');
    location.assign('administrararea.php')
    </script>";
} else {
    echo "<script languaje='JavaScript'> 
    alert('los datos NO se eliminaron correctamende de base de datos');
    location.assign('administrararea.php')
    </script>";
}
?>