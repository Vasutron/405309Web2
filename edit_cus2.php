<?php
$a = $_POST['cus_id'];
$b = $_POST['cus_title'];    
$c = $_POST['cus_fname'];
$d = $_POST['cus_lname'];
$e = $_POST['cus_addr'];
$f = $_POST['cus_tel'];
$g = $_POST['cus_user'];
$h = $_POST['cus_pass'];

if ($_FILES["cus_pic"]["name"]) {
    $i = $_FILES["cus_pic"]["name"];
    move_uploaded_file($_FILES["cus_pic"]["tmp_name"], "image/" . $i);
    $sql = "UPDATE customer SET cus_title='$b', cus_fname='$c', cus_lname='$d', cus_addr='$e', cus_tel='$f', cus_user='$g', cus_pass='$h', cus_pic='$i' WHERE cus_id='$a'";
} else {
    $sql = "UPDATE customer SET cus_title='$b', cus_fname='$c', cus_lname='$d', cus_addr='$e', cus_tel='$f', cus_user='$g', cus_pass='$h' WHERE cus_id='$a'";
}

require "dataconnect.php";
$query = mysqli_query($conn, $sql);

if ($query) {
?>
<script language="javascript">
    alert("Edit data OK");
    window.location.replace("show_sess_bs.php");
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