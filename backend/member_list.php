<!DOCTYPE html>
<html>
<head>
<?php
  if(isset($_SESSION['a_name'])){
    echo "<script>window.location = '../admin_login.php';</script>";
}
?>
<?php ;
error_reporting( error_reporting() & ~E_NOTICE );
?>
<head>
  <body>
  <?php include('navbar.php');?>
  <div class="container">
  <p></p>
<?php
      include('h.php');
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_member ORDER BY member_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table border="2" class="display table table-bordered" id="example1" align="center">';
                  //หัวข้อตาราง
                  echo "<thead>"; 
                    echo "
                      <tr >
                      <th>#</td>
                      <th>รหัสสมาชิก</td>
                      <th>username</td>
                      <th>ชื่อ</td>
                      <th>e-mail</td>
                      <th>ที่อยู่</td>
                    </tr>";
                    echo "</thead>"; 
                $count = 0;
                  while($row = mysqli_fetch_array($result)) {
                    $count+=1;
                  echo "<tr>";
                    echo "<td>" .$count .  "</td> ";
                    echo "<td>" .$row["member_id"] .  "</td> ";
                    echo "<td>" .$row["m_user"] .  "</td> ";
                    echo "<td>" .$row["m_name"] .  "</td> ";
                     echo "<td>" .$row["m_email"] .  "</td> ";
                      echo "<td>" .$row["m_address"] .  "</td> ";
                  
                  echo "</tr>";
                  }
                echo "</table>";
                //5. close connection
                mysqli_close($con);
                ?>