<?php
@include 'config.php';

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("location:login.php");
    exit;
}


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
        <h1>Welcome, <?php echo $_SESSION['username'];?></h1>
        

        <form method="post" action="">
            <div class="container-logout">
                <button class="form-btn" name="logout">Log Out</button>
            </div>
        </form>
        
        
    </div>


</body>

</html>