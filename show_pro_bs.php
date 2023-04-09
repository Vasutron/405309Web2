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

    <title>Show_Product</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">405309 WEB2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="regis1.php">Register1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pro1.php">Prodect</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="show_pro_bs.php">Show Prodect</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="show_sess_bs.php">Show Cutomer</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        Welcome ... <mark>
            <!-- <?php echo $_SESSION['name']; ?> -->
        </mark>
        <table class="table">
            <thead class="thead-light table-striped">
                <th>EDIT</th>
                <th>DEL</th>
                <th>ID</th>
                <th>Name</th>
                <th>type</th>
                <th>price</th>
                <th>Amount</th>
                <th>Picture</th>
            </thead>
            <?php
                require "dataconnect.php";
                $sql = "select * from product";
                $query = mysqli_query($conn, $sql);
                while ($rs = mysqli_fetch_assoc($query))
                {
                    $a = $rs['pro_id'];
                    $b = $rs['pro_name'];    
                    $c = $rs['pro_type'];
                    $d = $rs['pro_price'];
                    $e = $rs['pro_amount'];
                    $i = $rs['pro_pic'];
            ?>
            <tbody>
                <tr>
                    <td><a href="edit_pro1.php?id= <?=$a ;?>"><img
                                src="https://cdn0.iconfinder.com/data/icons/set-app-incredibles/24/Edit-01-64.png"
                                width="30" height="30"></td>
                    <td><a href="del_pro1.php?id= <?=$a ;?>"><img
                                src="https://cdn4.iconfinder.com/data/icons/linecon/512/delete-64.png" width="30"
                                height="30"></td>
                    <td><?= $a ?></td>
                    <td><?= $b ?></td>
                    <td><?= $c ?></td>
                    <td><?= $d ?></td>
                    <td><?= $e ?></td>
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