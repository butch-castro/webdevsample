<?php


@include 'config.php';

session_start();

if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}

if (isset($_GET['edit'])) {
    $product_name = mysqli_real_escape_string($conn, $_GET['edit']);
    $result = mysqli_query($conn, "SELECT * FROM `products` WHERE product_name='$product_name'");
}

if (isset($_POST['submit'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['productid']);
    $product_name = mysqli_real_escape_string($conn, $_POST['productname']);
    $product_price = mysqli_real_escape_string($conn, $_POST['productprice']);
    
    $select_existing = "SELECT * FROM `products` WHERE product_name = '$product_name' && product_id != '$product_id' ";
    $check = mysqli_query($conn, $select_existing);

    if(mysqli_num_rows($check) > 0){
        $error[] = 'Product name already exists';
    } else{
        $update = "UPDATE `products` SET product_name='$product_name', product_price='$product_price' WHERE product_id='$product_id'";
        $update_result = mysqli_query($conn, $update);
        echo `$update_result`;
        header('location:manageproduct.php');
    }
    

} else if (isset($_POST['backtomanageproducts'])) {
    header('location:manageproduct.php');
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
            <h1>Edit Product</h1>
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
                <p>Product ID:</p>
                <input type="text" name="productid" value=<?php echo $row['product_id']; ?> readonly>
                <p>Product Name:</p>
                <input type="text" name="productname" value=<?php echo $row['product_name']; ?> required>
                <p>Price:</p>
                <input type="text" name="productprice" value=<?php echo $row['product_price']; ?> required>
            </div>
            <?php } ?>

            <div class="buttons">
                <button class="form-btn" name="submit">Save Changes</button>
            </div>

            <div class="container-logout">
                <button class="form-btn" name="backtomanageproducts">Back to Manage Products</button>
            </div>
        </form>



    </div>


</body>

</html>