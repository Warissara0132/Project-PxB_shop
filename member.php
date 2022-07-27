<!DOCTYPE html>
<html>
<head>

<?php include('h.php');
    error_reporting( error_reporting() & ~E_NOTICE );
?>


<head>
  <body>
    <div class="col-md-9">
        
        <p></p>
        <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('member_form_add.php');
            }elseif ($act == 'edit') {
            include('member_edit.php');
            }
            else {
            include('home.php');
            }
        ?>
    </div>

    </div>
  </div>
  </body>
</html>