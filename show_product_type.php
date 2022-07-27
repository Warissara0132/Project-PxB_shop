<?php
if(!isset($_SESSION['m_id'])){
  echo "<script>window.location = 'member_login.php';</script>";
}
    $type_id = $_GET['type_id'] ;
    //echo $type_id ;
    //exit() ;

    $query_product_type = "SELECT * FROM tbl_product as p
    INNER JOIN tbl_type as t
    ON p.type_id = t.type_id
    WHERE p.type_id = $type_id
    ORDER BY p_id ASC"; 
    $result_pro =mysqli_query($con, $query_product_type) or die ("Error in query: 
        $query_type " . mysqli_error());
        //echo($query_product_type);
        //exit()
?>

<div class="row">

<?php foreach ($result_pro as $row_pro) { ?>
    <div class="card" style="width: 18rem; "> <!--margin-top:10px; // ใส่ไม่ให้ชนกับขอบบน-->
  <img  class="card-img-top" src="backend/p_img/<?php echo $row_pro['p_img']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row_pro['p_name']; ?></h5>
    <p class="card-text">ราคา : <?php echo number_format($row_pro['price'])." บาท"; ?></p>
    <p class="card-text">คลัง : <?php if($row_pro['stock'] == 0){
        echo "<font color='red'> สินค้าหมด </font>";}
        else{
          echo $row_pro['stock']." ชิ้น";
        }
        ?></p>
    <p class="card-text">ประเภท : <?php echo $row_pro['type_name']; ?></p>
    <a href="product_detail.php?id=<?php echo $row_pro['p_id']; ?>" class="btn btn-primary">รายละเอียด</a>
  </div>
</div>
<?php } ?>