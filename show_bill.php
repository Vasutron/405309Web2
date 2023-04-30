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

    <title>Order summary</title>
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
                                <img src="image/<?php echo $_SESSION['cus_pic']; ?>" width="30" height="30"
                                    class="rounded-circle me-2">
                                <?php } ?> <strong><?php echo $_SESSION['cus_fname']; ?></strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"><?php include('counter.php'); ?></a>
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
                <a class="btn btn-outline-primary" href="show_pro_sell.php">รายการสินค้า</a>
            </li>
        </ul>
        <br>

        <table class="table">
            <thead class="thead-light table-striped">
                <tr>
                    <th colspan="5" class="text-center">Summary Order</th>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">Dear : <strong><?= $_SESSION['cus_fname'] ?></strong></td>
                    <td colspan="3" class="text-center">Date : <strong><?= date('Y-m-d') ?></strong></td>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require "dataconnect.php";
                    $sql = "SELECT * FROM cart WHERE cart_cus_fname = '".$_SESSION['cus_fname']."'";
                    $query = mysqli_query($conn, $sql);
                    $total_price = 0; // ราคารวมเริ่มต้นเป็น 0
                    $count = 1; // กำหนดตัวแปรนับจำนวนแถว ใช้ในการแสดงค่าตัวเลขลำดับ No.
                    while ($rs = mysqli_fetch_assoc($query))
                    {
                        $a = $count;
                        $b = $rs['cart_pro_name'];
                        $c = $rs['cart_pro_price'];
                        $e = $rs['cart_amount'];
                        $d = $rs['cart_total'];
                        $total_price += $d; // นำราคาสินค้ามาบวกเพิ่มกับราคารวมเดิม

                        $count++;
                    ?>
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $b ?></td>
                    <td><?= number_format($c, 2, '.', ',') ?> </td>
                    <td><?= $e ?></td>
                    <td><?= number_format($d, 2, '.', ',') ?> บาท</td>
                </tr>
                    <?php 
                        }
                    ?>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total Price:</strong></td>
                    <td><strong><?= number_format($total_price, 2, '.', ',') ?> บาท </strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>