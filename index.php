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

    <div class="container">
    ข้อมูลใน container ภายใต้ div
      <!-- Content here -->
      <h1>Hello, world!</h1>
      <b>สวัสดีนาย</b>
      <p>สวัสดีนางสาว</p>

      <b>ข้อมูลใน class row</b>
      <div class="row"><!-- ข้อมูลในคราส row ภายใต้ div -->
          <div class="col">
              Column1<br>
              test1<br>
          </div>
          <div class="col">
              Column2
          </div>
          <div class="col">
              Column3
          </div>
      </div><br>

      <b>ข้อมูล Table</b>
      <table class="table table-primary table-striped table-hover table-bordered">
          <thead>
              <tr> <!-- // กำหนดหัวตาราง -->
                  <th scope="col">#</th> <!-- // ข้อมูลในหัวแถว -->
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <th scope="row">1</th> <!-- // ข้อมูลในแถว 1..n -->
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
              </tr>
              <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
              </tr>
              <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>Luanglum</td>
                  <td>@twitter</td>
              </tr>
              <tr>
                  <th scope="row">4</th>
                  <td>วสุทร</td>
                  <td>เลิงลำ</td>
                  <td>github.com/Vasutron</td>
              </tr>
          </tbody>
      </table>

    </div>
    <br>
    <b>test ข้อมูลนอก container และอยู่ นอก div container</b>


    <!-- Optional JavaScript! -->
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>