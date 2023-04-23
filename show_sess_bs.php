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

    <title>Show_Customer</title>
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
                            <a class="nav-link" href="show_pro_bs.php">Show Prodect</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="show_sess_bs.php">Show Cutomer</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php if(isset($_SESSION['cus_fname'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Welcome, <?php echo $_SESSION['cus_fname']; ?>
                        </a>
                        <li class="nav-item">
                            <a class="nav-link" ><?php include('counter.php'); ?>
                        </a>
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
        <table class="table">
            <thead class="thead-light table-striped">
                <th>EDIT</th>
                <th>DEL</th>
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
                    <td><a href="edit_cus1.php?id= <?=$a ;?>"><img
                                src="https://cdn0.iconfinder.com/data/icons/set-app-incredibles/24/Edit-01-64.png"
                                width="30" height="30"></td>
                    <td><a href="#" onclick="confirmDelete('<?=$a;?>')"><img
                                src="https://cdn4.iconfinder.com/data/icons/linecon/512/delete-64.png" width="30"
                                height="30"></a></td>
                    <td><?= $a ?></td>
                    <td><?= $b ?></td>
                    <td><?= $c ?></td>
                    <td><?= $d ?></td>
                    <td><?= $e ?></td>
                    <td><?= $f ?></td>
                    <td><?= $g ?></td>
                    <td>
                        <input type="password" readonly class="form-control-plaintext" value="<?= $h ?>">
                    </td>
                    <td><img src="image/<?= $i ?>" width="100" height="100"></td>

                    <!-- <td><a href="add_cart1.php?id=<? echo $a ?>"
                            onClick="if(confirm('Are you sure ??')) return true;else return false;"><img
                                src="img/cart2.jpg" width="36" height="38"></td> -->
                    <?php 
                        } 
                    ?>
            </tbody>
        </table>
    </div>

    <script>
    function confirmDelete(id) {
        if (confirm("Are you sure to delete this item?")) {
            window.location.href = "del_cus1.php?id=" + id;
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