
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PxB SHOP </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="member_data.php">ข้อมูลของฉัน</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?')">ออกจากระบบ</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>


<?php session_start();?>
<?php include('showname.php');?>
<body>
<div class="container">
  <p></p>
  <center>
    <div class="col-md-12">
<?php

      include('h.php');
                //1. เชื่อมต่อ database:
                include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM tbl_member WHERE m_name ='$m_name' ";
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
 echo "<center>";
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                echo ' <table border="2" class="display table table-bordered" id="example1" align="center">';
                  //หัวข้อตาราง 
                  echo "<thead>"; 
                    echo "
                      <tr align = center>
            
                      <th>username</td>
                      <th>password</td>
                      <th>name</td>
                      <th>email</td>
                      <th>tel</td>
                      <th>address</td>
                   
                    </tr>";
                    echo "</thead>"; 
                  while($row = mysqli_fetch_array($result)) {
                    

                  echo "<tr align = center>";
                   
                    echo "<td>" .$row["m_user"] .  "</td> ";
                    echo "<td>" .$row["m_pass"] .  "</td> ";
                    echo "<td>" .$row["m_name"] .  "</td> ";
                     echo "<td>" .$row["m_email"] .  "</td> ";
                     echo "<td>" .$row["m_tel"] .  "</td> ";
                      echo "<td>" .$row["m_address"] .  "</td> ";
                    //แก้ไขข้อมูล
                    echo "<a href='member.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a>";  
                    echo "<a href='backend/member_del_db.php?ID=$row[0]' class='btn btn-danger btn-xs' onclick='return confirm('ยันยันการลบ')'>ลบบัญชี</a>";
                    echo "</tr>";
                  }
      
                echo "</table>";
                //5. close connection
                mysqli_close($con);

?>


