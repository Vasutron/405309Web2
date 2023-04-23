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

    <title>EDIT_Product FORM!</title>
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

    <?php
    // สร้างฟอร์มแก้ไขข้อมูล
    // 1. เชื่อมต่อ database:
    // $z = $_GET["id"];
    require "dataconnect.php";
    // 2. query ข้อมูลจากตาราง:
    $query = "SELECT * FROM product WHERE pro_id ='" . $_GET["id"] . "' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    ?>
    <div class="container">


        <form name="form1" method="post" action="edit_pro2.php" enctype="multipart/form-data">

            <div class="mt-3 mb-3 row">
                <!--// แถว 1 -->
                <label class="col-sm-3 col-form-label">Product_ID :</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="pro_id" name="pro_id"
                        value="<?=$row['pro_id'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Product_Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_name" name="pro_name"
                        value="<?=$row['pro_name'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Type :</label>
                <div class="col-sm-10">
                    <select class="form-select" id="pro_type" name="pro_type">
                        <option value="accessories" <?=($row['pro_type'] == 'accessories') ? 'selected' : ''?>>
                            Accessories</option>
                        <option value="notebook" <?=($row['pro_type'] == 'notebook') ? 'selected' : ''?>>Notebook
                        </option>
                        <option value="smartphone" <?=($row['pro_type'] == 'smartphone') ? 'selected' : ''?>>Smartphone
                        </option>
                        <option value="smartwatch" <?=($row['pro_type'] == 'smartwatch') ? 'selected' : ''?>>Smartwatch
                        </option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Price :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_price" name="pro_price"
                        value="<?=$row['pro_price'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Amount :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_amount" name="pro_amount"
                        value="<?=$row['pro_amount'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Old Picture : </label>
                <div class="col-sm-10">
                    <img src="image/<?=$row['pro_pic']?>" style="max-width: 300px; max-height: 300px;">
                </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">NEW Picture :</label>
                <div class="col-sm-10">
                    <?php
            if ($row['pro_pic']) {
                echo '<img src="image/'.$row['pro_pic'].'" style="max-width: 300px; max-height: 300px;" id="imagePreview">';
            } else {
                echo '<img id="imagePreview" style="max-width: 300px; max-height: 300px;">';
            }
        ?>
                    <input type="file" class="form-control form-control-sm" id="pro_pic" name="pro_pic"
                        onchange="previewImage(event)">
                </div>
            </div>

            <!--//สคริปต์ แสดงรูปภาพก่อนอัพโหลด -->

            <head>
                <script>
                function previewImage(event) {
                    var input = event.target;
                    var reader = new FileReader();
                    reader.onload = function() {
                        var imagePreview = document.getElementById('imagePreview');
                        imagePreview.src = reader.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                </script>
            </head>


            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">ยืนยันแก้ไข</button>
                <a class="btn btn-danger mb-3" href="show_pro_bs.php" role="button">กลับ</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>