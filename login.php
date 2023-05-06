<?php


@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    if($_POST['username'] == '' || $_POST['password'] == ''){
        $error[] = 'Please input in all fields';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);  
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $select = "SELECT * FROM `user_account` WHERE username = '$username' && password = '$password' ";
        $result = mysqli_query($conn, $select);
    
        if(mysqli_num_rows($result) > 0){
            $_SESSION['$username'] = $row['name'];
            header('location:user.php');
        } else {
            echo "Wrong login details entered";
        }
    }
    
};

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Commerce App</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <div class="container">
        <div class="menu">
            <form action="" method="post">
                <h1>Login Page</h1>
                <?php
                if(isset($error)) {
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <div class="container-forms">
                    <p>Username:</p>
                    <input type="text" name="username">
                    <p>Password:</p>
                    <input type="password" name="password">
                </div>

                <div class="buttons">
                    <button class="form-btn" name='submit'>Login</button>
                </div>
            </form>
            <a href="adminlogin.php"><button class="form-btn">Admin Login</button></a>
        </div>

    </div>


</body>

</html>