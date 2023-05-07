<?php
@include 'config.php';

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

$loggedin_user = $_SESSION["username"];

if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("location:login.php");
    exit;
}

if(isset($_POST['cart'])){
    header("location:usercart.php");
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
        <h1>Welcome <?php echo $loggedin_user ?>!</h1>

        <?php 
            $query = "SELECT * FROM `products`";
            $results = mysqli_query($conn, $query);
        ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td>
                        <a href="addtocart.php?item=<?php echo $row['product_name']; ?>"><Button class="form-btn">Buy</Button></a>
                    </td>
                    
                    
                </tr>
            <?php } ?>
            
        </table>

        <form method="post" action="">
            <div class="container-cart">
                <button class="form-btn" name="cart">Cart</button>
            </div>
            <div class="container-logout">
                <button class="form-btn" name="logout">Log Out</button>
            </div>

            
        </form>
        
        
    </div>


</body>

</html>