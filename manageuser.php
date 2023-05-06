<?php

    @include 'config.php';

    if(isset($_GET['username'])){
        $username = mysqli_real_escape_string($conn, $_GET['username']);
        $result = mysqli_query($conn, "DELETE FROM `user_account` WHERE username = '$username'");
        echo `$result`;
    }
    
    if(isset($_POST['backtoadmin'])){
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
    <div class="container manage">
        <h1>Manage Users</h1>


        
        <?php 
            $query = "SELECT * FROM `user_account`";
            $results = mysqli_query($conn, $query);
        ?>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td>
                        <a href="manageuser.php?username=<?php echo $row['username']; ?>"><Button class="form-btn">Delete</Button></a>
                    </td>
                    
                </tr>
            <?php } ?>
            
        </table>
            
        
        
        <form action="" method="post">
            <div class="container-logout">
                <button class="form-btn delete-user" name="backtoadmin">Back to Admin Dashboard</button>
            </div>
        </form>
    </div>



</body>

</html>