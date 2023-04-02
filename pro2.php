<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Product!</title>
</head>

<body>
    
    <?php
        $a = $_POST['pro_id'];
        $b = $_POST['pro_name'];    
        $c = $_POST['pro_type'];
        $d = $_POST['pro_price'];
        $e = $_POST['pro_amount'];
        $i = $_FILES["pro_pic"]["name"];
        move_uploaded_file($_FILES["pro_pic"]["tmp_name"], "image/" . $i);
        require "dataconnect.php";
        $sql = "INSERT INTO product (pro_id, pro_name, pro_type, pro_price, pro_amount, pro_pic) VALUES ('$a', '$b', '$c', '$d', '$e', '$i')";
        $query = mysqli_query($conn, $sql);
        
        if ($query) {
   ?>
    <script language="javascript">
        alert("Add data OK");
        window.location.replace("show_pro_bs.php");
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