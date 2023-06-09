<?php
    include('header.php')
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
                            <a class="nav-link" href="show_pro_sell.php">Show Prodect Sell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="show_pro_bs.php">Show Prodect</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="show_sess_bs.php">Show Cutomer</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['cus_fname'])) { ?>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Welcome : <?php if(isset($_SESSION['cus_pic'])) { ?>
                            <img src="image/<?php echo $_SESSION['cus_pic']; ?>" width="30" height="30" class="rounded-circle me-2">
                        <?php } ?> <strong><?php echo $_SESSION['cus_fname']; ?></strong></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" ><?php include('counter.php'); ?></a>
                        </li>
                        <li>
                        <a type="nav-link" class="btn btn-danger ms-auto" href="logout.php">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li>
                        <a type="nav-link" class="btn btn-primary ms-auto" href="login1.php">Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="regis1.php">Register</a>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <br>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="btn btn-outline-primary" href="pro1.php">Add Prodect</a>
                <a class="btn btn-outline-primary" href="join2.php">ShoW Join Prodect</a>
            </li>
        </ul>
        <br>

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
                    <td><a href="#" onclick="confirmDelete('<?=$a;?>')"><img
                                src="https://cdn4.iconfinder.com/data/icons/linecon/512/delete-64.png" width="30"
                                height="30"></a></td>
                    <td><?= $a ?></td>
                    <td><?= $b ?></td>
                    <td><?= $c ?></td>
                    <td><?= number_format($d, 2, '.', ',') ?> บาท</td>
                    <td><?= $e ?></td>
                    <td><img src="image/<?= $i ?>" width="100" height="100"></td>
                    <?php 
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
    function confirmDelete(id) {
        if (confirm("Are you sure to delete this item?")) {
            window.location.href = "del_pro1.php?id=" + id;
        } else {
            return false;
        }
    }
    </script>

    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>