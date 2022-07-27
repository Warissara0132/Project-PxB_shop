<?php
    session_start();
    include('backend/condb.php');
    include('checktel.php');

    $errors = array();
    
    if (isset($_POST['reg_user'])){

        $m_user = mysqli_real_escape_string($con, $_POST['m_user']);
        $m_pass = mysqli_real_escape_string($con, $_POST['m_pass']);
        $m_name = mysqli_real_escape_string($con, $_POST['m_name']);
        $m_email = mysqli_real_escape_string($con, $_POST['m_email']);
        $m_tel = mysqli_real_escape_string($con, $_POST['m_tel']);
        $m_address = mysqli_real_escape_string($con, $_POST['m_address']);

        if (empty($m_user)){
            array_push($errors, "Username is required");
        }
        if (empty($m_pass)){
            array_push($errors, "Password is required");
        }
        if (empty($m_name)){
            array_push($errors, "Name is required");
        }
        if (empty($m_email)){
            array_push($errors, "Email is required");
        }
        if (empty($m_tel)){
            array_push($errors, "Tel is required");
        }
        if (empty($m_address)){
            array_push($errors, "Address is required");
        }
        

        $user_check_query = "SELECT * FROM tbl_member WHERE m_user = '$m_user' OR m_email = '$m_email' OR m_tel = '$m_tel'";
        $query = mysqli_query($con, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result){ //เช็คว่ามีคนใช้แล้ว
            if($result['m_user'] === $m_user){
                array_push($errors, "มีผู้ใช้ Username นี้แล้ว");
                $_SESSION['error'] = "มีผู้ใช้ Username นี้แล้ว";
            }
            elseif($result['m_email'] === $m_email){
                array_push($errors, "มีผู้ใช้ e-mail นี้แล้ว");
                $_SESSION['error'] = "มีผู้ใช้ e-mail นี้แล้ว";
            }
            elseif($result['m_tel'] === $m_tel){
                array_push($errors, "เบอร์นี้มีผู้ใช้แล้ว");
                $_SESSION['error'] = "เบอร์นี้มีผู้ใช้แล้ว";
            }
        }

        if (count($errors) == 0){
            $sql = "INSERT INTO tbl_member (m_user,m_pass,m_name,m_email,m_tel,m_address) VALUES ('$m_user','$m_pass','$m_name','$m_email','$m_tel','$m_address')";
            mysqli_query($con,$sql);

            //$_SESSION['m_user'] = $m_user;
            //$_SESSION['success'] = "You are now logged in";
            echo "<script type='text/javascript'>";
            echo "alert('สมัครสมาชิกเรียบร้อยแล้ว');";
            echo "window.location = 'member_login.php'; ";
            echo "</script>";
        } else {

            //array_push($errors, "Username or Email already exists");
            //$_SESSION['error'] = "Username or Email already exists";
            header("location: member_create.php");
        }
    }
?>