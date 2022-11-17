<?php

include("Login/PHP/conexion_bd.php");
if(isset($_POST['search'])){

$buscar = $_POST['search'];
    $traerProducto = "SELECT variedad.foto_variedad,
     variedad.nombre_variedad, variedad.id_variedad, variedad.id_vegetal,
     vegetal.nombre_vegetal, variedad.descuento,
     variedad.unidad_variedad, variedad.precio, stock.cantidad_stock 
    FROM variedad, stock, vegetal
    WHERE variedad.descuento = 0 AND variedad.id_variedad = stock.id_variedad AND variedad.id_vegetal = vegetal.id_vegetal 
    AND vegetal.nombre_vegetal LIKE '$buscar%';";
    $res1 = mysqli_query($conexion, $traerProducto);
    $json = array();
    while($row1 = mysqli_fetch_array($res1)){
        $traer[] = array(
            'foto' => $row1['foto_variedad'],
            'id_vegetal' => (int)$row1['id_vegetal'],
            'id_variedad' => (int)$row1['id_variedad'],
            'nombreVegetal' => $row1['nombre_vegetal'],
            'nombreVariedad' => $row1['nombre_variedad'],
            'precio' => (int)$row1['precio'],
            'unidad' => $row1['unidad_variedad'],
            'stock' => (int)$row1['cantidad_stock'],
        );
        
    }

    $busqueda = json_encode($traer);
    echo $busqueda;

}


?>