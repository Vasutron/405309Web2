<?php
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

    <title>Hello, world!</title>
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
        <h1>Product</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                        require "dataconnect.php";
                        $sql = "SELECT * FROM product";
                        $query = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($query);
                        for ($i = 0; $i < $count; $i++) {
                            if ($i == 0) {
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';
                            } else {
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" aria-label="Slide '.($i+1).'"></button>';
                            }
                        }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                    $query = mysqli_query($conn, $sql);
                    $active = "active";
                    while ($rs = mysqli_fetch_array($query)) {
                        echo '
                        <div class="carousel-item '.$active.'">
                        <img src="image/'.$rs['pro_pic'].'" class="d-block w-100" alt="'.$rs['pro_name'].'" style="margin-top: 20px;">

                        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.5); color: white;">
                            <h5>'.$rs['pro_name'].'</h5>
                            <p>'.number_format($rs['pro_price'], 2).' บาท</p>
                        </div>
                        </div>
                        ';
                        $active = "";
                    }
                    ?>
                    </div>

                    <button class="carousel-control-prev btn btn-secondary" type="button"
                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next btn btn-primary" type="button"
                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
                <div class="text-center mt-5">
                    <p>Explore our collection of products now!</p>
                    <button type="button" class="btn btn-primary">View Products</button>
                </div>
            </div>
        </div>

        <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['cus_fname'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome, <?php echo $_SESSION['cus_fname']; ?></a>
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

    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>