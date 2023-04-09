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
    <p>Index <a href="index.php">Click here</a></p>
    <p>Register1<a href="regis1.php">Click here</a></p>
    <p>Product<a href="pro1.php">Click here</a></p>
    </header>

    <?php
    // สร้างฟอร์มแก้ไขข้อมูล
    // 1. เชื่อมต่อ database:
    $z = $_GET["id"];
    require "dataconnect.php";
    // 2. query ข้อมูลจากตาราง:
    $query = "SELECT * FROM product WHERE pro_id = '$z'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    ?>
    <div class="container">
        

        <form name="form1" method="post" action="edit_pro2.php" enctype="multipart/form-data">

            <div class="mt-3 mb-3 row">
                <!--// แถว 1 -->
                <label class="col-sm-3 col-form-label">Product_ID :</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="pro_id" name="pro_id" value="<?=$row['pro_id'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Product_Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_name" name="pro_name" value="<?=$row['pro_name'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Type :</label>
                <div class="col-sm-10">
                    <select class="form-select" id="pro_type" name="pro_type">
                        <option value="1" <?=($row['pro_type'] == '1') ? 'selected' : ''?>>1</option>
                        <option value="2" <?=($row['pro_type'] == '2') ? 'selected' : ''?>>2</option>
                        <option value="3" <?=($row['pro_type'] == '3') ? 'selected' : ''?>>3</option>
                        <option value="4" <?=($row['pro_type'] == '4') ? 'selected' : ''?>>4</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Price :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_price" name="pro_price" value="<?=$row['pro_price'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Amount :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pro_amount" name="pro_amount" value="<?=$row['pro_amount'] ?>">
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