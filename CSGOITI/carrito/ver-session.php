<?php
session_start();

if(isset($_POST['ok'])){
    if(isset($_SESSION['ID'])){
        echo "si";
    }else{
        echo "no";
    }
}

?>