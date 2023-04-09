<?php
$a = $_POST['pro_id'];
$b = $_POST['pro_name'];    
$c = $_POST['pro_type'];
$d = $_POST['pro_price'];
$e = $_POST['pro_amount'];

// ตรวจสอบว่ามีการอัพโหลดรูปภาพใหม่หรือไม่
if ($_FILES["pro_pic"]["name"]) {
    $i = $_FILES["pro_pic"]["name"];
    move_uploaded_file($_FILES["pro_pic"]["tmp_name"], "image/" . $i);
    $sql = "UPDATE product SET pro_name='$b', pro_type='$c', pro_price='$d', pro_amount='$e', pro_pic='$i' WHERE pro_id='$a'";
} else {
    $sql = "UPDATE product SET pro_name='$b', pro_type='$c', pro_price='$d', pro_amount='$e' WHERE pro_id='$a'";
}

require "dataconnect.php";
$query = mysqli_query($conn, $sql);

if ($query) {
?>
<script language="javascript">
    alert("Edit data OK");
    window.location.replace("show_pro_bs.php");
</script>
<?php
} else {
?>
<script language="javascript">
    alert("Edit data Fail");
    window.history.back();
</script>
<?php
}
?>