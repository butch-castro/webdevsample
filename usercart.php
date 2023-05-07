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
if(isset($_POST['continueshopping'])){
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
        <h1>CART</h1>

        <?php 
            $query = "SELECT * FROM `cart` WHERE username='$loggedin_user'";
            $results = mysqli_query($conn, $query);
            $total = 0;
        ?>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <?php $item_name = $row['product_name']; ?>
                <?php $products = mysqli_query($conn, "SELECT * FROM `products` WHERE product_name='$item_name'");?>
                <?php while ($price_row = mysqli_fetch_array($products)) { ?>
                    <?php $total += $row['quantity'] * $price_row['product_price'];?>
                    <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $price_row['product_price']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>
                        <a href="addtocart.php?item=<?php echo $row['product_name']; ?>"><Button class="form-btn">Edit</Button></a>
                    </td>
                    <td>
                        <a href="usercart.php?delete=<?php echo $row['product_name']; ?>"><Button class="form-btn delete">Delete</Button></a>
                    </td>
                </tr>
                <?php }?>
                
            <?php } ?>
            
        </table>
        
        <h2>Total: <?php echo $total;?></h2>
        
        
        <form action="" method="post">
            <div class="container-logout">
                <button class="form-btn delete-user" name="continueshopping">Continue Shopping</button>
            </div>
        </form>
    </div>



</body>

</html>