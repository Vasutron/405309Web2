<?php
    include('header.php');

    $z = $_GET["id"];
    
    include('dataconnect.php');
    $sqli = "SELECT * FROM product WHERE pro_id = '".$_GET['id']."' ";
    $result = mysqli_query($conn, $sqli);
    $row = mysqli_fetch_array($result);
    
    $cartCusName = $_SESSION['cus_fname'];
    $cartProName = $row['pro_name'];
    $cartProPic = $row['pro_pic'];
    $cartProPrice = $row['pro_price'];

    // ตรวจสอบว่ามีการส่งค่า quantity เข้ามาหรือไม่
    if(isset($_POST['quantity'][$z])) {
        $cartAmount = $_POST['quantity'][$z]; // รับค่าจำนวนสินค้าจากการ submit
    } else {
        $cartAmount = 1; // ถ้าไม่มีการส่งค่ามา ให้กำหนดให้มีค่าเป็น 1
    }

    
    $cartDate = date("Y-m-d");

    // คำนวณค่าสินค้าทั้งหมดในตะกร้า
    $cartTotal = $cartProPrice * $cartAmount;

    $sqli2 = "INSERT INTO cart (cart_id, cart_cus_fname, cart_pro_name, cart_pro_pic, cart_amount, cart_pro_price, cart_date, cart_total) values ('', '$cartCusName', '$cartProName', '$cartProPic', '$cartAmount', '$cartProPrice', '$cartDate', '$cartTotal')";
    $result2 = mysqli_query($conn, $sqli2);

    if($result2)
    {
        ?>
        <script>
            alert("เพิ่มสินค้าลงตะกร้าเรียบร้อยแล้ว");
            window.location = "show_bill.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("เพิ่มสินค้าลงตะกร้าไม่สำเร็จ");
            window.location = "show_pro_sell.php";
        </script>
        <?php
    }
?>