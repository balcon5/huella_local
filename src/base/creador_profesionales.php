<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysqli_error());
mysqli_select_db($link,'huella_local') or die('No se pudo seleccionar la base de datos');

$nombre = $_REQUEST['nombres'];
$apellidos = $_REQUEST['apellidos'];
$profesion = $_REQUEST['profesion'];
$area = $_REQUEST['area'];
$sueldoLiquido = $_REQUEST['sueldo'];
$sueldoBruto = $_REQUEST['haberes'];
$proyectos = $_REQUEST['proyectos'];
$fechaIngreso = date('Y-m-d',strtotime(str_replace('/', '-', $_REQUEST['fecha2'])));
$fechaNacimiento = date('Y-m-d',strtotime(str_replace('/', '-', $_REQUEST['fecha1'])));;


$feachaInComp=str_replace('-', '',$fechaIngreso);
$feachaNacComp=str_replace('-', '',$fechaNacimiento);


        $sql = "INSERT INTO profesionales "."(nombres, apellidos, fecha_nac, fecha_ing, sueldo_bruto, sueldo_liquido, profesion, area) "."VALUES "."('$nombre','$apellidos','$feachaNacComp','$feachaInComp','$sueldoBruto','$sueldoLiquido','$profesion','$area')";
        $retval = mysqli_query($link, $sql);
        
        if(!$retval ) {
            die(1 . mysql_error());
         }else{
            $query = "SELECT max(id) FROM profesionales ";
            $result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error());
            $id=0;

            while($res=mysqli_fetch_assoc($result)){
            $id=$res.id;
            }
            $fun=true;
            foreach($proyectos as $idProy ){
                $idProyecto ='';
                $idP=$idProy['id'];
                $por=$idProy['porcentaje'];
                $query1 = "SELECT * FROM proyectos WHERE codigo=$idP";
                $result1 = mysqli_query($link,$query1) or die('Consulta fallida: ' . mysqli_error());
                while($res1=mysqli_fetch_assoc($result1)){
                    $idProyecto=$res1.id;
                }

                $sql1 = "INSERT INTO proy_prof "."(proy, prof, porc) "."VALUES "."('$idProyecto','$id','$por')";
                $retval1 = mysqli_query($link, $sql1);
                if($retval1){
                    $fun=false
                }
            }
            if($fun){
                echo 0;
            }else{
                echo 2;
            }
         }







 ?>


