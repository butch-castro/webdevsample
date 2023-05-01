<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
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
    <div class="container">
        <h1>User Page of <?php echo $_SESSION['username']?></h1>

        <div class="container-logout">
            <a href="login.php"><button class="form-btn">Log Out</button></a>
        </div>
        
    </div>


</body>

</html>