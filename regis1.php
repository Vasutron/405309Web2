<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register1!</title>
</head>

<body>
    <header>
    <p>Index <a href="index.php">Click here</a></p>
    </header>
    <div class="container">
        

        <form name="form1" method="post" action="regis2.php" enctype="multipart/form-data">

            <div class="mt-3 mb-3 row">
                <!--// แถว 1 -->
                <label class="col-sm-3 col-form-label">Customer_ID :</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="cus_id" name="cus_id" value="AUTO_example : 0">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Title :</label>
                <div class="col-sm-10">
                    <select class="form-select" id="cus_title" name="cus_title">
                        <option value="Boy">Boy</option>
                        <option value="Girl">Girl</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_fname" name="cus_fname">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Last name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_lname" name="cus_lname">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Address :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_addr" name="cus_addr">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Tel :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_tel" name="cus_tel">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">User :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_user" name="cus_user">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Password :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cus_pass" name="cus_pass">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Picture :</label>
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