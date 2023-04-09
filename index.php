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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        <h1>Product</h1>
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
                <img src="image/'.$rs['pro_pic'].'" class="d-block w-25" alt="'.$rs['pro_name'].'" >
                <div class="carousel-caption d-none d-md-block" style="color: white; text-shadow: 1px 1px black;">
                    <h5>'.$rs['pro_name'].'</h5>
                    <p>'.$rs['pro_price'].' บาท</p>
                </div>
                </div>
                ';
                $active = "";
            }
            ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>