<?php
include("conexion_bd.php");

//TRAEMOS TODAS LAS OFERTAS CON STOCK DISPONIBLES
$ofertas = "SELECT variedad.foto_variedad, variedad.nombre_variedad, vegetal.nombre_vegetal, variedad.descuento, variedad.unidad_variedad, variedad.precio, stock.cantidad_stock FROM variedad, stock, vegetal WHERE variedad.descuento > 0 AND variedad.id_variedad = stock.id_variedad AND variedad.id_vegetal = vegetal.id_vegetal;";
$res1 = mysqli_query($conexion,$ofertas);

    
$json = array();
while($row1 = mysqli_fetch_array($res1)){
    $ofertasmenu = array(
        'descuento' => (int)$row1['descuento'],
        'foto' => $row1['foto_variedad'],
        'vegetal' => $row1['nombre_vegetal'],
        'variedad' => $row1['nombre_variedad'],
        'unidad_variedad' => $row1['unidad_variedad'],
        (int)'precio' => (int)$row1['precio'],
        (int)'stock' => (int)$row1['cantidad_stock'],
    );
}
$ofertasMain = json_encode($ofertasmenu);
echo $ofertasMain;



if(isset($_GET[''])){

}







?>