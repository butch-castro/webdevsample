<?php


@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);  
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $select = "SELECT * FROM `user_account` WHERE username = 'admin' && password = '$password' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['adminloggedin'] = true;
        header('location:admin.php');
        
    } else {
        echo "Wrong login details entered";
    }
} else if (isset($_POST['backtologin'])){
    header('location:login.php');
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
    <div class="container short-form">
    <h1>Admin Login Page</h1>
        <div class="menu">
            <form action="" method="post">
                
                <div class="container-forms">
                    <p>Username:</p>
                    <input type="text" name="username">
                    <p>Password:</p>
                    <input type="password" name="password">
                </div>

                <div class="buttons">
                    <button class="form-btn" name="submit">Login as Admin</button>

                </div>

                <div class="container-logout">
                <button class="form-btn" name="backtologin">Back to User Login</button></a>
                </div>
            </form>
        </div>
    </div>


</body>

</html>