
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




echo  '<table border="2" class="display table table-bordered" id="example1" align="center">';
  //หัวข้อตาราง
  echo "<thead>";
    echo "<tr>
      <th width='5%'>#</td>
      <th width='5%'>id</td>
      <th width=25%>type</td>
      <th width=30%>name</td>
      <th width=30%>detail</td>
      <th width=25%>price</td>
      <th width=25%>stock</td>
      <th width=25%>img</td>
      <th width=5%>edit</td>
      <th width=5%>delete</td>
    </tr>";
    echo "</thead>";
    $count = 0;
  while($row = mysqli_fetch_array($result)) {
    $count+=1;
  echo "<tr>";
    echo "<td align=center>".$count."</td>";
    echo "<td>" .$row["p_id"] .  "</td> ";
    echo "<td>" .$row["type_name"] .  "</td> ";
    echo "<td>" .$row["p_name"] .  "</td> ";
    echo "<td>" .$row["p_detail"] .  "</td> ";
    echo "<td>" .$row["price"] .  "</td> ";
    echo "<td>" .$row["stock"] .  "</td> ";
    echo "<td align=center>"."<img src='p_img/".$row['p_img']."' width='100'>"."</td>";
    //แก้ไขข้อมูล
    echo "<td><a href='product.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>edit</a></td> ";
    
    //ลบข้อมูล
    echo "<td><a href='product_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>del</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>