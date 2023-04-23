<?php
session_start();
if(isset($_SESSION['cus_fname'])){
    echo "";
}else{
    header("Location: index.php");
    exit();
}

if(!isset($_SESSION['cus_id'])){
    echo""; // กำหนดค่าเริ่มต้น
}

if(!isset($_SESSION['cus_pic'])){
    echo""; // กำหนดค่าเริ่มต้น
}
?>