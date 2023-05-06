<?php


@include 'config.php';


if(isset($_POST['submit'])){
    
    if($_POST['product_name'] == '' || $_POST['product_price'] == '' ){
        $error[] = 'Please input in all fields';
    } else {
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);  
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $product_id = random_bytes(20);
 

        $select = "SELECT * FROM `products` WHERE product_name = '$product_name'";
            $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'Product already exists';
        } else{
            $insert = "INSERT INTO products(product_id, product_name, product_price) VALUES('$product_id','$product_name','$product_price')";
            mysqli_query($conn, $insert);
            header('location:admin.php');
        }
    }

    
} else if (isset($_POST['backtoadmin'])){
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
    <div class="container short-form">
        <h1>Add Product</h1>
        <div class="menu">
        <form action="" method="post">
            
            <?php
            if(isset($error)) {
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <div class="container-forms">
                <p>Product Name:</p>
                <input type="text" name="product_name">
                <p>Product Price:</p>
                <input type="number" step="any" name="product_price">
            </div>

            <div class="buttons">
                <button class="form-btn" name="submit">Add Product</button>
            </div>

            <div class="container-logout">
                <button class="form-btn" name="backtoadmin">Back to Admin Dashboard</button>
            </div>
        </form>
        </div>
        



    </div>


</body>

</html>