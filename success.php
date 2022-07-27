<?php

session_start();
include('backend/condb.php');
$id = $_REQUEST['id'];
$num2 = $_SESSION['q'];
$sql = "SELECT * FROM tbl_product WHERE p_id = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$num1 = $row['stock'];
$sum = 0;
$sum = $num1 - $num2;
$sql2 = "UPDATE tbl_product SET
    stock = $sum
    WHERE p_id='$id' ";
$result2 = mysqli_query($con, $sql2);
echo "<script type='text/javascript'>";
echo "alert('สั่งสินค้าเรียบร้อยแล้ว');";
echo "window.location = 'home.php'; ";
echo "</script>";
?>