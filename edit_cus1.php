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

    <title>EDIT_Customer FORM!</title>
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

    require "dataconnect.php";

    $query = "SELECT * FROM customer WHERE cus_id ='" . $_GET["id"] . "' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    ?>
    <div class="container">
        <form name="form1" method="post" action="edit_cus2.php" enctype="multipart/form-data">

            <div class="mt-3 mb-3 row">
                <!--// แถว 1 -->
                <label class="col-sm-3 col-form-label">Customer_ID :</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="cus_id" name="cus_id"
                        value="<?=$row['cus_id'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Title :</label>
                <div class="col-sm-10">
                    <select class="form-select" id="cus_title" name="cus_title">
                        <option value="Boy" <?=($row['cus_title'] == 'Boy') ? 'selected': '' ?>>Boy</option>
                        <option value="Girl" <?=($row['cus_title'] == 'Girl') ? 'selected': '' ?>>Girl</option>
                        <option value="Male" <?=($row['cus_title'] == 'Male') ? 'selected': '' ?>>Male</option>
                        <option value="Female" <?=($row['cus_title'] == 'Female') ? 'selected': '' ?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_fname" name="cus_fname"
                        value="<?=$row['cus_fname'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Last name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_lname" name="cus_lname"
                        value="<?=$row['cus_lname'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Address :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_addr" name="cus_addr"
                        value="<?=$row['cus_addr'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Tel :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_tel" name="cus_tel" value="<?=$row['cus_tel'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">User :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_user" name="cus_user"
                        value="<?=$row['cus_user'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Password :</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="cus_pass" name="cus_pass"
                        value="<?=$row['cus_pass'] ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Old Picture : </label>
                <div class="col-sm-10">
                    <img src="image/<?=$row['cus_pic']?>" style="max-width: 300px; max-height: 300px;">
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">PNEW Picture :</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-sm" id="cus_pic" name="cus_pic"
                            onchange="previewImage(event)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <!--// ฟอร์มแสดงรูปภาพก่อนอัพโหลด -->
                    <label class="col-sm-3 col-form-label">Preview :</label>
                    <div class="col-sm-10">
                        <img id="imagePreview" style="max-width: 300px; max-height: 300px;">
                    </div>
                </div>

                <!--//สคริปต์ แสดงรูปภาพก่อนอัพโหลด -->
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


                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">ยืนยันแก้ไข</button>
                    <a class="btn btn-danger mb-3" href="show_sess_bs.php" role="button">กลับ</a>
                </div>
        </form>
    </div>

    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>