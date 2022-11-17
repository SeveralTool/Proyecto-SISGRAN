<?php
include '../../conexion_bd.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $consulta2 = "SELECT 
    
    (SELECT SUM(cultiva.cantidad) FROM cultiva WHERE cultiva.id_huerta = '$id') AS 'totalCultivado', (SELECT SUM(cosecha.cantidad) FROM cosecha WHERE cosecha.id_huerta = '$id') AS 'totalCosechado', 
    (SELECT SUM(cosecha.cantidad) FROM cosecha, variedad WHERE variedad.unidad_variedad = 'atado' AND cosecha.id_variedad = variedad.id_variedad AND cosecha.id_huerta = '$id') AS 'totalATADOScosechados',
    (SELECT SUM(cosecha.cantidad) FROM cosecha, variedad WHERE variedad.unidad_variedad = 'kg' AND cosecha.id_variedad = variedad.id_variedad AND cosecha.id_huerta = '$id') AS 'totalkgcosechados',
    (SELECT SUM(cosecha.cantidad) FROM cosecha, variedad WHERE variedad.unidad_variedad = 'unidad' AND cosecha.id_variedad = variedad.id_variedad AND cosecha.id_huerta = '$id') AS 'totalUNIDADEScosechadas',
    (SELECT SUM(cultiva.cantidad) FROM cultiva, variedad WHERE variedad.unidad_variedad = 'unidad' AND cultiva.id_variedad = variedad.id_variedad AND cultiva.id_huerta = '$id') AS 'totalUNIDADESCultivadas',
    (SELECT SUM(cultiva.cantidad) FROM cultiva, variedad WHERE variedad.unidad_variedad = 'kg' AND cultiva.id_variedad = variedad.id_variedad AND cultiva.id_huerta = '$id') AS 'totalKGCultivados',
    (SELECT SUM(cultiva.cantidad) FROM cultiva, variedad WHERE variedad.unidad_variedad = 'atado' AND cultiva.id_variedad = variedad.id_variedad AND cultiva.id_huerta = '$id') AS 'totalATADOSCultivados';";
    $res2 = mysqli_query($conexion, $consulta2);

    while($row2 = mysqli_fetch_array($res2)){
        if(is_null($row2)){
            echo "null";
        }else{
            $produ[] = array(
                'totalCultivado' => $row2['totalCultivado'],
                'totalCosechado' => $row2['totalCosechado'],
                'totalAtadosCosechados' => $row2['totalATADOScosechados'],
                'totalKgCosechados' => $row2['totalkgcosechados'],
                'totalUnidadesCosechadas' => $row2['totalUNIDADEScosechadas'],
                'totalAtadosCultivados' => $row2['totalATADOSCultivados'],
                'totalKgCultivados' => $row2['totalKGCultivados'],
                'totalUnidadesCultivadas' => $row2['totalUNIDADESCultivadas'],
            );
        }
    }
    $produccion = json_encode($produ);
    echo $produccion;



}


?>