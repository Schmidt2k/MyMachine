<?php
    session_start();

    if(isset($_SESSION['Nome'])){
        unset($_SESSION['Nome']);
        unset($_SESSION['CPF']);
    } 
    if(isset($_SESSION['Tipo'])){
        unset($_SESSION['Tipo']);
    }
    header("location:login.php");
?>