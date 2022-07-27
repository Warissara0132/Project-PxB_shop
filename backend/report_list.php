
<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง 
$query = "
SELECT * FROM tbl_product as p 
INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:


$sql = 'select sum(stock) as PSUM from tbl_product';

        $result1 = mysqli_query($con,$sql);

        $resultarray = mysqli_fetch_array($result1);

        echo "จำนวนสินค้าคงเหลือทั้งหมด ".number_format($resultarray['PSUM'])." ชิ้น";
        echo "<p></p>";

echo  '<table border="2" class="display table table-bordered" id="example1" align="center">';
  //หัวข้อตาราง
  echo "<thead>";
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
  while($row = mysqli_fetch_array($result)) {
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