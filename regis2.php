<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register2!</title>
</head>

<body>
    <?php
        $a = $_POST['cus_id'];
        $b = $_POST['cus_title'];    
        $c = $_POST['cus_fname'];
        $d = $_POST['cus_lname'];
        $e = $_POST['cus_addr'];
        $f = $_POST['cus_tel'];
        $g = $_POST['cus_user'];
        $h = $_POST['cus_pass'];
        $i = $_FILES["cus_pic"]["name"];
        move_uploaded_file($_FILES["cus_pic"]["tmp_name"], "image/" . $i);
        require "dataconnect.php";
        $sql = "INSERT INTO customer (cus_id, cus_title, cus_fname, cus_lname, cus_addr, cus_tel, cus_user, cus_pass, cus_pic) VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i')";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
   ?>
    <script language="javascript">
        alert("Add data OK");
        window.location.replace("show_sess_bs.php");
    </script>
    <?php
        } else {
    ?>
    <script language="javascript">
        alert("Add data Fail");
        window.history.back();
    </script>
    <?php
        } 
    ?>


    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>