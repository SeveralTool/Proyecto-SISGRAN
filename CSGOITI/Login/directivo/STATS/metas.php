<?php
include '../../conexion_bd.php';

$consulta1 = "SELECT (SELECT SUM(cultiva.cantidad) FROM cultiva) AS 'totalCultivado', (SELECT SUM(cosecha.cantidad) FROM cosecha) AS 'totalCosechado', 
(SELECT SUM(cosecha.cantidad) FROM cosecha, variedad WHERE variedad.unidad_variedad = 'atado' AND cosecha.id_variedad = variedad.id_variedad) AS 'totalATADOScosechados',
(SELECT SUM(cosecha.cantidad) FROM cosecha, variedad WHERE variedad.unidad_variedad = 'kg' AND cosecha.id_variedad = variedad.id_variedad) AS 'totalkgcosechados',
(SELECT SUM(cosecha.cantidad) FROM cosecha, variedad WHERE variedad.unidad_variedad = 'unidad' AND cosecha.id_variedad = variedad.id_variedad) AS 'totalUNIDADEScosechadas',
(SELECT SUM(cultiva.cantidad) FROM cultiva, variedad WHERE variedad.unidad_variedad = 'unidad' AND cultiva.id_variedad = variedad.id_variedad) AS 'totalUNIDADESCultivadas',
(SELECT SUM(cultiva.cantidad) FROM cultiva, variedad WHERE variedad.unidad_variedad = 'kg' AND cultiva.id_variedad = variedad.id_variedad) AS 'totalKGCultivados',
(SELECT SUM(cultiva.cantidad) FROM cultiva, variedad WHERE variedad.unidad_variedad = 'atado' AND cultiva.id_variedad = variedad.id_variedad) AS 'totalATADOSCultivados',
(SELECT SUM(cosecha.cantidad) FROM cosecha WHERE YEAR(cosecha.fecha_cosecha) = YEAR(CURRENT_DATE()) ) - 
(SELECT SUM(cultiva.cantidad) FROM cultiva WHERE YEAR(cultiva.fecha_cultivo) = YEAR(CURRENT_DATE()) AND cultiva.estado_cultivo = 'cosechado') AS 'diferenciaProduccion',
(SELECT SUM(cosecha.cantidad) FROM cosecha, huerta WHERE YEAR(cosecha.fecha_cosecha) = YEAR(CURRENT_DATE()) AND cosecha.id_huerta = huerta.id_huerta 
 AND huerta.tamaño_huerta = 'pequeña') 
- 5000 AS 'Produccion/MetasHuertaChica',
 (SELECT SUM(cosecha.cantidad) FROM cosecha, huerta WHERE YEAR(cosecha.fecha_cosecha) = YEAR(CURRENT_DATE()) 
AND cosecha.id_huerta = huerta.id_huerta AND huerta.tamaño_huerta = 'mediana') - 8000 AS 'Produccion/MetasHuertaMediana';
";
$res1 = mysqli_query($conexion,$consulta1);
$row1 = mysqli_fetch_array($res1);
$met[] = array(
    'totalCultivado' => $row1['totalCultivado'],
    'totalCosechado' => $row1['totalCosechado'],
    'KGcosechados' => $row1['totalkgcosechados'],
    'ATADOScosechados' => $row1['totalATADOScosechados'],
    'UNIDADEScosechadas' => $row1['totalUNIDADEScosechadas'],
    'KGcultivados' => $row1['totalKGCultivados'],
    'ATADOScultivados' => $row1['totalATADOSCultivados'],
    'UNIDADEScultivadas' => $row1['totalUNIDADESCultivadas'],
    'diferencia' => $row1['diferenciaProduccion'],
    'metasChicas' => $row1['Produccion/MetasHuertaChica'],
    'metasMedianas' => $row1['Produccion/MetasHuertaMediana'],
);
$metas = json_encode($met);
echo  $metas;
