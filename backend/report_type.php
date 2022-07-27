<?php
    $type_id = $_GET['type_id'] ;
    $query_product_type = "SELECT * FROM tbl_product as p
    INNER JOIN tbl_type as t
    ON p.type_id = t.type_id
    WHERE p.type_id = $type_id
    ORDER BY p_id ASC"; 
    $result_pro =mysqli_query($con, $query_product_type) or die ("Error in query: 
        $query_type " . mysqli_error());

    
        $qpt = "SELECT sum(stock) as PSUM FROM tbl_product as p
        INNER JOIN tbl_type as t
        ON p.type_id = t.type_id
        WHERE p.type_id = $type_id
        ORDER BY p_id ASC"; 
$result = mysqli_query($con,$qpt);

$resultarray = mysqli_fetch_array($result);

echo "จำนวนสินค้าคงเหลือทั้งหมด ".number_format($resultarray['PSUM'])." ชิ้น";
        echo "<p></p>";


       
        echo  '<table border="2" class="display table table-bordered" id="example1" align="center">';
  //หัวข้อตาราง
  echo "<thead >";
  echo "<tr align = center >
  <th >#</td>
  <th >รูปภาพ</td>
  <th >รหัสสินค้า</td>
  <th >ประเภท</td>
  <th >ชื่อสินค้า</td>
  <th >รายละเอียด</td>
  <th >ราคาขาย/ชิ้น</td>
  <th >คงเหลือ(ชิ้น)</td>
</tr>";
    echo "</thead>";
    $count = 0;
        while($row = mysqli_fetch_array($result_pro)) {
          $count+=1;
          echo "<tr>";
          echo "<td align=center>".$count."</td>";
          echo "<td align=center>"."<img src='p_img/".$row['p_img']."' width='100'>"."</td>";
          echo "<td align = center>" .$row["p_id"] .  "</td> ";
          echo "<td align = center>" .$row["type_name"] .  "</td> ";
          echo "<td>" .$row["p_name"] .  "</td> ";
          echo "<td>" .$row["p_detail"] .  "</td> ";
          echo "<td align = center>" .$row["price"] .  "</td> ";
          echo "<td align = center>" .$row["stock"] .  "</td> ";
          
        echo "</tr>";
        }
      echo "</table>";
      //5. close connection
      mysqli_close($con);
        
?>
