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
       
        <p></p>
        <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('member_form_add.php');
            }elseif ($act == 'edit') {
            include('member_form_edit.php');
            }
            else {
            include('member_list.php');
            }
        ?>
    </div>

    </div>
  </div>
  </body>
</html>