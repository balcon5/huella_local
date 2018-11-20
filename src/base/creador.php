<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysqli_error());
mysqli_select_db($link,'huella_local') or die('No se pudo seleccionar la base de datos');

$query = 'SELECT * FROM proyectos';
$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error());

$codigo = $_REQUEST['codigo'];
$nombre = $_REQUEST['nombre'];
$fechaInicio = $_REQUEST['fecha1'];
$fechaFin = $_REQUEST['fecha2'];
$descripcion = $_REQUEST['descripcion'];

$sql = "INSERT INTO proyectos "."(codigo, nombre, fechaInicio, fechaFin, descripcion) "."VALUES "."('$codigo','$nombre','$fechaInicio','$fechaFin','$descripcion')";
$retval = mysqli_query($link, $sql);
 ?>

 <?php
            if(!$retval ) {
               die('Could not enter data: ' . mysql_error());
               echo "Ocurrio un error al crear el proyecto, intentelo nuevamente";
            }else{
                echo "Proyecto creado exitosamente";
?>

<?php
     }
?>

