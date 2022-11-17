<?php
include 'conexion_bd.php';

if(isset($_POST['correo']) && isset($_POST['pass'])){

    
    $correoUser = $_POST['correo'];
    $passUser = $_POST['pass'];
    
    $verificarRol = "SELECT usuario.correo, usuario.password, usuario.rol
    FROM usuario WHERE usuario.correo = '$correoUser';";
    $res1 = mysqli_query($conexion, $verificarRol);
    $row1 = mysqli_fetch_array($res1);
////////////COMPROBAR SI EXISTE USER        
    if(!empty($row1)){
        $datosUser = array(
            'correo' => $row1['correo'],
            'pass' => $row1['password'],
            'rol' => $row1['rol'],
        );
////////////COMPROBAR SI SE VALIDAN DATOS
        if($row1['password'] === md5($passUser) && $row1['correo'] === $correoUser){
            
            if($row1['rol'] === "rol_web"){
                $verificarCliente = "SELECT cliente.estado_cliente FROM cliente WHERE cliente.correo = '$correoUser';";
                $res2 = mysqli_query($conexion, $verificarCliente);
                $row2 = mysqli_fetch_array($res2);
                if($row2['estado_cliente'] === "pendiente"){
                    echo "pendiente";
                }else if($row2['estado_cliente'] === "rechazado"){
                    echo "rechazado";
                }else if($row2['estado_cliente'] === "eliminado"){
                    echo "eliminado";
                }else if($row2['estado_cliente'] === "aceptado"){
                    $logCliente = "SELECT cliente.nº_cliente, cliente_web.nombre FROM cliente, cliente_web WHERE cliente.correo = '$correoUser' AND cliente.nº_cliente = cliente_web.nº_cliente;";
                    $resID = mysqli_query($conexion, $logCliente);
                    $row3 = mysqli_fetch_array($resID);
                    session_start();
                    $_SESSION["ID"] = $row3['nº_cliente'];
                    $_SESSION['NOMBREWEB'] = $row3['nombre'];
                    $_SESSION['ROL'] = $row1['rol'];
                    $_SESSION['CORREO'] = $correoUser;
                    echo 2;
                   
                }
            }
////////////COMPROBAR DATOS EMPRESA
        else if($row1['rol'] === "rol_empresa"){
            $verificarClienteEmpresa = "SELECT cliente.estado_cliente FROM cliente WHERE cliente.correo = '$correoUser';";
                $res3 = mysqli_query($conexion, $verificarClienteEmpresa);
                $row3 = mysqli_fetch_array($res3);
                if($row3['estado_cliente'] === "pendiente"){
                    echo "pendiente";
                }else if($row3['estado_cliente'] === "rechazado"){
                    echo "rechazado";
                }else if($row3['estado_cliente'] === "eliminado"){
                    echo "eliminado";
                }else if($row3['estado_cliente'] === "aceptado"){
                    $logClienteEmpresa = "SELECT cliente.nº_cliente, cliente_empresa.nombre FROM cliente, cliente_empresa WHERE cliente.correo = '$correoUser' AND cliente.nº_cliente = cliente_empresa.nº_cliente;";
                    $resIDEmpresa = mysqli_query($conexion, $logClienteEmpresa);
                    $row3 = mysqli_fetch_array($resIDEmpresa);
                    session_start();
                    $_SESSION["ID"] = $row3['nº_cliente'];
                    $_SESSION['NOMBREEMPRESA'] = $row3['nombre'];
                    $_SESSION['ROL'] =$row1['rol'];
                    $_SESSION['CORREO'] = $correoUser;
                    echo 2;
        }
    }
////////////COMPROBAMOS DATOS DE HUERTAS
        else if($row1['rol'] === "rol_huerta"){
            $verificarHuerta = "SELECT huerta.id_huerta, huerta.nombre_huerta, huerta.estado_huerta FROM huerta WHERE huerta.correo = '$correoUser';";
            $resHUERTA = mysqli_query($conexion, $verificarHuerta);
            $row4 = mysqli_fetch_array($resHUERTA);
            //echo $row4['estado_huerta'];
            if($row4['estado_huerta'] == "pendiente" || $row4['estado_huerta'] == "aprobada"){
                echo "pendiente";
            }else if($row4['estado_huerta'] == "eliminada"){
                echo "eliminado";
            }else if($row4['estado_huerta'] == "aceptada"){
                session_start();
            $_SESSION['ID'] = $row4['id_huerta'];
            $_SESSION['NOMBREHUERTA'] = $row4['nombre_huerta'];
            $_SESSION['ROL'] = $row1['rol'];
            $_SESSION['CORREO'] = $correoUser;
            echo 3;
            }else if($row4['estado_huerta'] == "rechazada"){
                echo "rechazado";
            }
        }
////////////COMPROBAMOS DIRECTVO
        else if($row1['rol'] === "rol_directivo"){
            $traerDirectivo = "SELECT usuario.nombre_personal FROM usuario WHERE usuario.correo = '$correoUser';";
            $res5 = mysqli_query($conexion,$traerDirectivo);
            $row5 = mysqli_fetch_array($res5);
            session_start();
            $_SESSION['PERSONAL'] = $row1['correo'];
            $_SESSION['NOMBREPERSONAL'] = $row5['nombre_personal'];
            $_SESSION['ROL'] = $row1['rol'];
            echo 4;
        }
////////////COMPROBAMOS ADMINISTRADOR
        else if($row1['rol'] === "rol_admin"){
            $traerAdmin = "SELECT usuario.nombre_personal FROM usuario WHERE usuario.correo = '$correoUser';";
            $res6 = mysqli_query($conexion,$traerAdmin);
            $row6 = mysqli_fetch_array($res6);
            session_start();
            $_SESSION['PERSONAL'] = $row1['correo'];
            $_SESSION['NOMBREPERSONAL'] = $row6['nombre_personal'];
            $_SESSION['ROL'] = $row1['rol'];
            echo 5;
        }
////////////COMPROBAMOS INFORMATICO
        else if($row1['rol'] === "rol_informatico"){
            $traerInformatico = "SELECT usuario.nombre_personal FROM usuario WHERE usuario.correo = '$correoUser';";
            $res7 = mysqli_query($conexion,$traerInformatico);
            $row7 = mysqli_fetch_array($res7);
            session_start();
            $_SESSION['PERSONAL'] = $row1['correo'];
            $_SESSION['NOMBREPERSONAL'] = $row7['nombre_personal'];
            $_SESSION['ROL'] = $row1['rol'];
            echo 6;
        }
////////////COMPROBAMOS REPARTIDOR
        else if($row1['rol'] === "rol_repartidor"){
            $traerRepartidor = "SELECT usuario.nombre_personal FROM usuario WHERE usuario.correo = '$correoUser';";
            $res8 = mysqli_query($conexion,$traerRepartidor);
            $row8 = mysqli_fetch_array($res8);
            session_start();
            $_SESSION['PERSONAL'] = $row1['correo'];
            $_SESSION['NOMBREPERSONAL'] = $row8['nombre_personal'];
            $_SESSION['ROL'] = $row1['rol'];
            echo 7;
        }
////////////COMPROBAMOS FERIANTE
        else if($row1['rol'] === "rol_vendedor"){
            $traerVendedor = "SELECT usuario.nombre_personal FROM usuario WHERE usuario.correo = '$correoUser';";
            $res9 = mysqli_query($conexion,$traerVendedor);
            $row9 = mysqli_fetch_array($res9);
            session_start();
            $_SESSION['PERSONAL'] = $row1['correo'];
            $_SESSION['NOMBREPERSONAL'] = $row9['nombre_personal'];
            $_SESSION['ROL'] = $row1['rol'];
            echo 8;
        }
////////////        
        }else{
            echo 0;
        }
////////////            
        }else{
            echo 1;
        }

}
