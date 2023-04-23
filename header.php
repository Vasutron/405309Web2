<?php
session_start();
if(isset($_SESSION['cus_fname'])){
    echo "";
}else{
    header("Location: index.php");
    exit();
}
?>