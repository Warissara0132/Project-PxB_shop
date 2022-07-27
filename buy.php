<?php
session_start();
include('h.php');
include('backend/condb.php');
$p_id = $_GET["id"];

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style>
    div.polaroid {
        width: 80%;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 25px;
    }

    div.container_di {
        text-align: center;
        padding: 10px 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <?php include('navbar.php'); ?>
        <div class="row">
            <?php
      $sql = "SELECT * FROM tbl_product as p 
              INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
               AND p_id = $p_id ";
      $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);
      ?>
            <form action="success.php?id=<?php echo $row["p_id"];?>" method="post">
                <div class="col-md-5">
                    <div class="container" style="margin-top: 50px">
                        <div class="row">
                            <?php
                if(isset($_POST['addorder'])){
                    $_SESSION['q'] = $_POST['num'];
                    $num = $_POST['num'];
                    $balance = $row["stock"]-$num; 
                }
            ?>
                            <center>
                                <h2>ข้อมูลสินค้า</h2><br>
                                <?php echo"<img src='backend/p_img/".$row['p_img']."'width='30%'>";?>
                                <div class="container_di">
                                    <h4><?php echo $row["p_name"];?></h4>
                                    <h4>ราคา <?php echo number_format($row["price"]);?> บาท</h4>
                                    <h4>จำนวน <?php echo $num;?> ชิ้น</h4>
                                    <h4>ราคารวม <?php echo number_format($num*$row["price"]);?> บาท</h4>
                                    <p></p>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container" style="margin-top: 50px">
                        <div class="row">
                            <div class="col-sm-10" align="center">
                                <?php
                if(isset($_POST['addorder'])){
                    $_SESSION['q'] = $_POST['num'];
                    $num = $_POST['num'];
                    $balance = $row["stock"]-$num; 
                }
            ?>
                                <h2>กรอกข้อมูลสำหรับการจัดส่ง</h2><br>
                                ้<h5>ชื่อ-นามสกุล ผู้รับ</h5><br>
                                <input name="m_name" type="text" required class="form-control" id="m_name"
                                    placeholder="ชื่อ-สกุล " />
                                <p></p>
                                <h5>เบอร์โทรผู้รับ</h5><br>
                                <input name="m_tel" type="text" class="form-control" id="m_tel"
                                    placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
                                <p></p>
                                <h5>ที่อยู่ผู้รับ</h5><br>
                                <textarea name="m_address" class="form-control " id="m_address" required
                                    placeholder="ที่อยู่"></textarea>
                                <p></p>
                                <button type="submit" class="btn btn-primary btn-lg" name="success">ยืนยัน</button>
                                <?php
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</body>

</html>