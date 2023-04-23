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

    <title>Product!</title>
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
                        <li>
                            <a type="nav-link" class="btn btn-danger ms-auto" href="logout.php">LOGOUT </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="regis1.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">        
        Welcome ... <mark>
                <?php echo $_SESSION['cus_fname']; ?>
            </mark>
        <form name="form1" method="post" action="pro2.php" enctype="multipart/form-data">

            <div class="mt-3 mb-3 row">
                <!--// แถว 1 -->
                <label class="col-sm-3 col-form-label">Product_ID :</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="pro_id" name="pro_id"
                        value="AUTO_example : 0">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Product_Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_name" name="pro_name">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Type :</label>
                <div class="col-sm-10">
                    <select class="form-select" id="pro_type" name="pro_type">
                        <option value="accessories">Accessories</option>
                        <option value="notebook">Notebook</option>
                        <option value="smartphone">Smartphone</option>
                        <option value="smartwatch">Smartwatch</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Price :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_price" name="pro_price">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Amount :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_amount" name="pro_amount">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Picture :</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control form-control-sm" id="pro_pic" name="pro_pic"
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
                <button type="submit" class="btn btn-primary mb-3">Confirm</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>