<?php
if(isset($counter)){
    $counter += 1;
    setcookie("counter", $counter, time() + 3600);
}else{
    setcookie("counter", 1, time() + 3600);
}
echo "คุณเข้าชมเว็บไซต์นี้แล้ว " . $_COOKIE['counter'] . " ครั้ง";
// echo "คุณเข้าชมเว็บไซต์นี้ครั้งล่าสุดเมื่อ " . date("d/m/Y H:i:s", $_COOKIE['counter']);
?>