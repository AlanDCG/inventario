<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Ingresa a una cuenta.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO product (proname,amount) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "')";
        if($conn->query($sql)){
            echo "<script>alert('Añadido Satisfactoriamente')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
        else{
            echo "<script>alert('Operación Fallida')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor completa los campos.')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>