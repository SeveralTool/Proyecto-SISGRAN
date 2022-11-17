<?php
include("../conexion_bd.php");
error_reporting(0);
//PEDIMOS DATOS DESDE HUERTA
$huertas = "SELECT huerta.id_huerta, huerta.nombre_huerta, huerta.tamaño_huerta, huerta.correo, huerta.direccion FROM huerta WHERE huerta.estado_huerta = 'pendiente';";
$res1 = mysqli_query($conexion, $huertas);

    while($row1 = mysqli_fetch_array($res1)){ 
            $hue[] = array(
                'id' => (int)$row1['id_huerta'],
                'nombre' => $row1['nombre_huerta'],
                'size' => $row1['tamaño_huerta'],
                'correo' => $row1['correo'],
                'direccion' => $row1['direccion'],
            );
        }
if($hue == null){
    echo "sin";
    
}else{
    $huerta = json_encode($hue);
    echo $huerta;
}
       


//APROVACION DE DIRECCION PARA ACEPTAR HUERTAS POR PARTE DE ADMINISTRACION
if(isset($_POST['idAcept'])){
    $idAcept = $_POST['idAcept'];
    $consulta1 = "UPDATE huerta SET huerta.estado_huerta = 'aprobada' WHERE huerta.id_huerta = '$idAcept';";
    $res1 = mysqli_query($conexion,$consulta1);
}

if(isset($_POST['idDecline'])){
    $idDecline = $_POST['idDecline'];
    $consulta2 = "UPDATE huerta SET huerta.estado_huerta = 'rechazada' WHERE huerta.id_huerta = '$idDecline';;";
    $res2 = mysqli_query($conexion,$consulta2);
}

?>