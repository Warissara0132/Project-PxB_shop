<?php 
    session_start();
    include('h.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form action="checkmember.php" method="post">
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
            <input type="text" name="m_user">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="m_pass">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <p>Not yes a member? <a href="member_create.php">Sign up</a></p>
    </form>
</body>
</html>