<?php
// เชื่อมต่อฐานข้อมูล
require "dataconnect.php";

// รับค่า id ที่จะลบ
$id = $_GET['id'];

// ลบข้อมูลจากตาราง product
$sql = "DELETE FROM product WHERE pro_id='$id'";
$query = mysqli_query($conn, $sql);

// ตรวจสอบว่าลบข้อมูลสำเร็จหรือไม่
if ($query) {
    ?>
<script language="javascript">
alert("Delete data OK");
window.location.replace("show_pro_bs.php");
</script>
<?php
} else {
?>
<script language="javascript">
alert("Delete data Fail");
window.history.back();
</script>
<?php
}
?>