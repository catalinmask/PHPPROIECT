<?php
include "ConnectDb.php";
if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
    $sql = "delete from `Angajati` where id=$id";
    $result = mysqli_query($connection, $sql);
    if($result){
        header('location:Employees.php'); 
    }
}   
?>