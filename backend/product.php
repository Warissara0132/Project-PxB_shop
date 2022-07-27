<!DOCTYPE html>
<html>
<head>
<?php include('h.php');
$query_type = "SELECT * FROM tbl_type ORDER BY type_id ASC";
$result_type =mysqli_query($con, $query_type) or die ("Error in query: $query_type " . mysqli_error());
error_reporting( error_reporting() & ~E_NOTICE );
?>
<head>
  <body>
  <?php include('navbar.php');?>
  <div class="container">
  <p></p>
  
    <div class="row">
    <center>
            <div  class="btn-group"> 
                <?php
                    foreach ($result_type as $row )  { ?>
                    <a href="product.php?act=showbytype&type_id=<?php echo $row['type_id'];?>" 
                        button type="button" class="btn btn-primary"> 
                        <?php echo $row["type_name"]; ?></a>
                <?php } ?>             
            </div>

    <div class="col-md-12">
    <p></p>
        <a href="product.php?act=add" class="btn-info btn-sm" >เพิ่ม</a>
        <p></p>

        <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('product_form_add.php');
            }elseif ($act == 'edit') {
            include('product_form_edit.php');
            }elseif($act == 'showbytype'){
              echo"<p></p>";
              include('show_product_type.php');
            } 
            else {
            include('product_list.php');
            }
        ?>
    </div>

    </div>
  </div>
  </body>
</html>