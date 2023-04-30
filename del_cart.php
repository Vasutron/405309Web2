<?php
require "dataconnect.php";

$id_cart = $_GET['cart_id'];

$sql = "DELETE FROM cart WHERE cart_id='$id_cart'";
$query = mysqli_query($conn, $sql);

if ($query) {
    ?>
<script language="javascript">
alert("Delete data OK");
window.location.replace("show_bill.php");
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