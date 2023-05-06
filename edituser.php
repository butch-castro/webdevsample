<?php


@include 'config.php';

if (isset($_GET['username'])) {
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $result = mysqli_query($conn, "SELECT * FROM `user_account` WHERE username='$username'");
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $date_created = date("Y-m-d");

    //$select = "SELECT * FROM `user_account` WHERE email = '$email' && password = '$password' ";
    $update = "UPDATE `user_account` SET username='$username', password='$password', first_name='$first_name', last_name='$last_name', mobile_number='$mobile_number' WHERE email='$email'";
    $update_result = mysqli_query($conn, $update);
    echo `$update_result`;
    header('location:manageuser.php');
    // if (mysqli_num_rows($result) > 0) {
    //     $error[] = 'Error encountered while editing user';
    // } else {
    //     $insert = "INSERT INTO user_account(username, first_name, last_name, email, mobile_number, password, date_created) VALUES('$username','$first_name','$last_name','$email','$mobile_number','$password', '$date_created')";
    //         mysqli_query($conn, $insert);
    //         header('location:admin.php');
        
    // }
} else if (isset($_POST['backtomanageusers'])) {
    header('location:manageuser.php');
}
;

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
            <h1>Edit User</h1>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>

            <?php while ($row = mysqli_fetch_array($result)) { ?>

            <div class="container-forms">
                <p>Username:</p>
                <input type="text" name="username" value=<?php echo $row['username']; ?> required>
                <p>Password:</p>
                <input type="password" name="password" value=<?php echo $row['password']; ?> required>
                <p>First Name:</p>
                <input type="text" name="first_name" value=<?php echo $row['first_name']; ?> required>
                <p>Last Name:</p>
                <input type="text" name="last_name" value=<?php echo $row['last_name']; ?> required>
                <p>Email Address:</p>
                <input type="text" name="email" value=<?php echo $row['email']; ?> readonly>
                <p>Mobile Number: </p>
                <input type="number" name="mobile_number" value=<?php echo $row['mobile_number']; ?> required>
            </div>
            <?php } ?>

            <div class="buttons">
                <button class="form-btn" name="submit">Save Changes</button>
            </div>

            <div class="container-logout">
                <button class="form-btn" name="backtomanageusers">Back to Manage Users</button>
            </div>
        </form>



    </div>


</body>

</html>