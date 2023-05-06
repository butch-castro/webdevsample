<?php


@include 'config.php';


if(isset($_POST['submit'])){
    
    if($_POST['username'] == '' || $_POST['password'] == '' || $_POST['first_name'] == '' || $_POST['last_name'] == '' || $_POST['email'] == '' || $_POST['mobile_number'] == ''){
        $error[] = 'Please input in all fields';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);  
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
        $date_created = date("Y-m-d");

        $select = "SELECT * FROM `user_account` WHERE email = '$email' && password = '$password' ";
            $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User already exists';
        } else{
            $insert = "INSERT INTO user_account(username, first_name, last_name, email, mobile_number, password, date_created) VALUES('$username','$first_name','$last_name','$email','$mobile_number','$password', '$date_created')";
            mysqli_query($conn, $insert);
            header('location:admin.php');
        }
    }

    
} else if (isset($_POST['backtoadmin'])){
    header('location:admin.php');
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
        <form action="" method="post">
            <h1>Create User</h1>
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
                <p>First Name:</p>
                <input type="text" name="first_name">
                <p>Last Name:</p>
                <input type="text" name="last_name">
                <p>Email Address:</p>
                <input type="text" name="email">
                <p>Mobile Number: </p>
                <input type="number" name="mobile_number">
            </div>

            <div class="buttons">
                <button class="form-btn" name="submit">Create Account</button>
            </div>

            <div class="container-logout">
                <button class="form-btn" name="backtoadmin">Back to Admin Dashboard</button>
            </div>
        </form>



    </div>


</body>

</html>