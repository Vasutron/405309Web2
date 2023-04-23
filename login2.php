<?php
session_start();

require('dataconnect.php');

if(isset($_POST['cus_user']) && isset($_POST['cus_pass'])){
    $cus_user = $_POST['cus_user'];
    $cus_pass = $_POST['cus_pass'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM customer WHERE cus_user = ? AND cus_pass = ?");
    mysqli_stmt_bind_param($stmt, "ss", $cus_user, $cus_pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) ==1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['cus_fname'] = $row['cus_fname'];
        $_SESSION['cus_pic'] = $row['cus_pic'];
        header("Location: show_pro_bs.php");
        exit;
    }else{
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง โปรดลองอีกครั้ง');</script>";
        header( "Refresh:0.1;url=login1.php" );
        exit;
    }
}
?>