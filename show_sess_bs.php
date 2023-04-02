<?php
    ob_start(); 
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Show_Customer</title>
</head>

<body>
    <header>
        <p>Index <a href="index.php">Click here</a></p>
        <p>Register1<a href="regis1.php">Click here</a></p>
        <p>Prodect<a href="pro1.php">Click here</a></p>
        <!-- <p>For repairmen. <a href="">Login Repairmen</a>.</p> -->
        ข้อมูลในแท็ก header
    </header>

    <div class="container">
        Welcome ... <mark>
            <?php echo $_SESSION['name']; ?>
        </mark>
        <table class="table">
            <thead class="thead-light table-striped">
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>LestName</th>
                <th>Address</th>
                <th>Tel</th>
                <th>Username</th>
                <th>Password</th>
                <th>Picture</th>
            </thead>
            <?php
                require "dataconnect.php";
                $sql = "select * from customer";
                $query = mysqli_query($conn, $sql);
                while ($rs = mysqli_fetch_assoc($query))
                {
                    $a = $rs['cus_id'];
                    $b = $rs['cus_title'];    
                    $c = $rs['cus_fname'];
                    $d = $rs['cus_lname'];
                    $e = $rs['cus_addr'];
                    $f = $rs['cus_tel'];
                    $g = $rs['cus_user'];
                    $h = $rs['cus_pass'];
                    $i = $rs["cus_pic"];
            ?>
            <tbody>
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $b ?></td>
                    <td><?= $c ?></td>
                    <td><?= $d ?></td>
                    <td><?= $e ?></td>
                    <td><?= $f ?></td>
                    <td><?= $g ?></td>
                    <td><?= $h ?></td>
                    <td><img src="image/<?= $i ?>" width="100" height="100"></td>

                    <!-- <td><a href="add_cart1.php?id=<? echo $a ?>"
                            onClick="if(confirm('Are you sure ??')) return true;else return false;"><img
                                src="img/cart2.jpg" width="36" height="38"></td> -->
                    <?php 
                        } 
                    ?>
            </tbody>
        </table>


        <script src="js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>