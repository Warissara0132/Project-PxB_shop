<?php 
    session_start();
    include("backend/condb.php");
    include("checktel.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="check_create_member.php" method="post">
        <?php include('errors.php'); ?>
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);                    
                    ?>
                </h3>            
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="m_user" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="m_pass" required>
        </div>
        
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" name="m_name" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="m_email" required>
        </div>
        <div class="input-group">
            <label for="tel">Tel.</label><br>
            <input name="m_tel" type="text"  onkeyup="autoTab2(this,2)"  />
        </div>
        <div class="input-group">
            <label for="email">Address</label>
            <input type="text" name="m_address" required>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="member_login.php">Sign in</a></p>
    </form>
</body>
</html>