<!DOCTYPE html>
<html>
<head>
<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<head>
  <body>
  <?php include('navbar.php');?>
  <div class="container">
  <p></p>
    <div class="row">
    
    <div class="col-md-12">
        <a href="admin.php?act=add" class="btn-info btn-sm" >เพิ่ม</a>
        <p></p>
        <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('admin_form_add.php');
            }elseif ($act == 'edit') {
            include('admin_form_edit.php');
            }
            elseif ($act == 'rwd') {
            include('admin_form_rwd.php');
            } 
            else {
            include('admin_list.php');
            }
        ?>
    </div>

    </div>
  </div>
  </body>
</html>