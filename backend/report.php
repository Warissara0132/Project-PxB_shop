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
                    <a href="report.php?act=showbytype&type_id=<?php echo $row['type_id'];?>" 
                        button type="button" class="btn btn-primary"> 
                        <?php echo $row["type_name"]; ?></a>
                <?php } ?>             
            </div>
    <div class="col-md-12">
    <p></p>

        <?php
            
            $act = $_GET['act'];
            if($act == 'showbytype'){
              echo"<p></p>";
              include('report_type.php');
            } 
            else {
            include('report_list.php');
            }
        ?>
    </div>

    </div>
</div>
  </body>
</html>