<?php
    @include 'config.php';

    if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    $select = "DELETE FROM `user_account` WHERE username = '$username'";
    $result = mysqli_query($conn, $select);
    
    echo `$result`;
    } else if(isset($_POST['backtoadmin'])){
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
        <h1>Manage Users</h1>
        <form action="" method="post">
        <?php
    
        $query = "SELECT * FROM `user_account`";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) > 0){
                while($row = $result->fetch_assoc()) {
                    echo '<div class="container-product"><p>
                    Username: ' . $row["username"] . ' 
                    </p></div>';
                }                   
            } else {
                echo "no users found";
            } 
      
        ?>
        <div class="container-forms">
            <p>Username:</p>
            <input type="text" name="username">
        </div>

        <div class="container-user">
            <button class="form-btn" name="submit">Delete</button>
        </div>

        <div class="container-logout">
            <button class="form-btn" name="backtoadmin">Back to Admin Dashboard</button>
        </div>
        </form>

    </div>


</body>

</html>