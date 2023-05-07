<?php
@include 'config.php';

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}
$loggedin_user = $_SESSION["username"];

if(isset($_GET['item']) && isset($_GET['qty'])){
    $product_name = mysqli_real_escape_string($conn, $_GET['item']);
    $query = "SELECT * FROM `products` WHERE product_name='$product_name'";
    $result = mysqli_query($conn, $query);
}

if(isset($_GET['delete'])){
    $product_name = mysqli_real_escape_string($conn, $_GET['delete']);
    $result = mysqli_query($conn, "DELETE FROM `cart` WHERE product_name = '$product_name' AND username='$loggedin_user'");
    echo `$result`;
}
if(isset($_POST['user'])){
    header("location:user.php");
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
    <div class="container manage">
        <h1>SUCCESS</h1>

        
        
        <form action="" method="post">
            <div class="menu">
                <button class="form-btn delete-user" name="user">Back to Shop</button>
            </div>
        
        </form>
    </div>



</body>

</html>