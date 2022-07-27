<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>
<body>
<?php
include('checktel.php');
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$member_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_member WHERE member_id='$member_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>


<form  name="register" action="member_edit_db.php" method="POST" class="form-horizontal">
<center>
<input type="hidden" name="member_id" value="<?php echo $member_id;?>">
<div class="container">
<div class="row">
<div class="col-sm-12" >
       <div class="form-group">
          <div class="col-sm-5" >
            <input  name="m_user" type="text" required class="form-control" id="m_user" value="<?=$m_user;?>"
            placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div> 
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" value="<?=$m_pass;?>" 
            placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?=$m_name;?>" 
            placeholder="ชื่อ-สกุล " />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input  name="m_email" type="email" class="form-control" id="m_email" value="<?=$m_email;?>"   
            placeholder=" อีเมล์ name@hotmail.com"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <input <input name="m_tel" type="text"  onkeyup="autoTab2(this,2)" class="form-control" id="m_tel" value="<?=$m_tel;?>"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5" align="left">
            <textarea name="m_address" class="form-control" id="m_address" value="<?=$m_address;?>" required placeholder="ที่อยู่"><?php echo $m_address; ?></textarea> 
          </div>
        </div>
      <div class="form-group">
          <div class="col-sm-5" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> บันทึก  </button>
          </div>     
      </div>
    </div>
    </div>
</div>
    </form>
    </center>
</body>
</html>

   