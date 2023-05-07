<?php
@include 'config.php';

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

$loggedin_user = $_SESSION["username"];

if(isset($_GET['item'])){
    $product_name = mysqli_real_escape_string($conn, $_GET['item']);
    $query = "SELECT * FROM `products` WHERE product_name='$product_name'";
    $result = mysqli_query($conn, $query);
}

if(isset($_POST['addtocart']) && isset($_POST['product']) !== '0'){
    $added_product = $_POST['product'];
    $added_qty = mysqli_real_escape_string($conn, $_POST['quantity']);

    $check_result = mysqli_query($conn, "SELECT * FROM `cart` WHERE username='$loggedin_user' AND product_name='$added_product'");

    if(mysqli_num_rows($check_result) > 0) {
        $update_result = mysqli_query($conn, "UPDATE `cart` SET quantity='$added_qty' WHERE username='$loggedin_user' AND product_name='$added_product'");
    }
    else {
        $query_insert = "INSERT INTO cart(username, product_name, quantity) VALUES('$loggedin_user', '$added_product', '$added_qty')";
        mysqli_query($conn, $query_insert);
    }
    
    header("location:usercart.php");
}

if(isset($_POST['backtouser'])){
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
    <div class="container">
        <h1>Add Item To Cart?</h1>
            <?php while($row = mysqli_fetch_array($result)) { ?>
            <form method="post" action="">
            <div class="menu">
                <div class="menu-item">
                    Name: <input type="text" name="product" value='<?php echo $row['product_name'];?>' readonly> 
                </div>
                
                <div class="menu-item">
                    <p>Price:</p>
                    <input type="number" name="price" value=<?php echo $row['product_price'];?> readonly> 
                </div>
                
                <div class="menu-item">
                    Quantity: <input type="number" name="quantity" step="any" value=1 min=1> 
                </div>
                
                <div class="buttons">
                    <button class="form-btn" name="addtocart">Add to Cart</button>
                </div>
                </form>
            </div>
            
            <?php } ?>
        
        

        <form method="post" action="">
            <div class="container-logout">
                <button class="form-btn" name="backtouser">Back</button>
            </div>
        </form>
        
        
    </div>


</body>

</html>