<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysqli_error());
mysqli_select_db($link,'huella_local') or die('No se pudo seleccionar la base de datos');

$codigo = $_REQUEST['codigo'];
$nombre = $_REQUEST['nombre'];
$fechaInicio = date('Y-m-d',strtotime(str_replace('/', '-', $_REQUEST['fecha1'])));
$fechaFin = date('Y-m-d',strtotime(str_replace('/', '-', $_REQUEST['fecha2'])));;

$feachaInComp=str_replace('-', '',$fechaInicio);
$feachaFnComp=str_replace('-', '',$fechaFin);

$descripcion = $_REQUEST['descripcion'];

$query = "SELECT * FROM proyectos WHERE codigo= $codigo"  ;
$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error());
$num=0;

while(mysqli_fetch_assoc($result)){
$num++;
}

if($feachaInComp < $feachaFnComp){
    if($num == 0){
        $sql = "INSERT INTO proyectos "."(codigo, nombre, fecha_ini, fecha_fin, descripcion) "."VALUES "."('$codigo','$nombre','$fechaInicio','$fechaFin','$descripcion')";
        $retval = mysqli_query($link, $sql);
        
        if(!$retval ) {
            die(1 . mysql_error());
         }else{
             echo 0;
         }
        
        }else{
            echo 2;
        }
}else{
    echo 3;
}





 ?>


