<?php
session_start();
if(isset($_SESSION['cus_fname'])){
    //echo "Welcome,ID: " . $_SESSION['UserID'];
}else{
    header("Location: index.php");
    exit();
}
?>