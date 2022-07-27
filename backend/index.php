<!DOCTYPE html>
<html>
<head>
<?php include('h.php');?>
<head>
  <body>
  <?php include('navbar.php');
  if(!isset($_SESSION['a_name'])){
        echo "<script>window.location = '../admin_login.php';</script>";
  }
  ?>
  <div class="container">
  <p></p>
    <div class="row">
      <div class="col-md-12">
        
        <p></p> 

       <center>
        
        <h2 align = "center">สวัสดีคุณ <?php echo $a_name; ?> </h2><br>
        <div class="list-group">
    <a href="admin.php" class="list-group-item list-group-item-action">จัดการผู้ดูแลระบบ</a>
    <a href="member_list.php" class="list-group-item list-group-item-action">สมาชิกในระบบ</a>
    <a href="type.php" class="list-group-item list-group-item-action">จัดการประเภทสินค้า</a>
    <a href="product.php" class="list-group-item list-group-item-action ">จัดการข้อมูลสินค้า</a>
    <a href="report.php" class="list-group-item list-group-item-action ">รายงานสินค้า</a>
    <a href="logout.php" class="list-group-item list-group-item-action " onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?')">ออกจากระบบ</a>
      </div>

        <?php
            echo "<br>";
            echo '<img src="picback/dress.gif" class="img-fluid" alt="Responsive image">' ;
        ?>
       </center>
    </div>

    </div> 
  </div>
  </body>
</html>