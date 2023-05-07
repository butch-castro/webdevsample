<?php

    @include 'config.php';
    session_start();

    if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
        header("location: adminlogin.php");
        exit;
    }
    if(isset($_GET['delete'])){
        $product_name = mysqli_real_escape_string($conn, $_GET['delete']);
        $result = mysqli_query($conn, "DELETE FROM `products` WHERE product_name = '$product_name'");
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
        <h1>Manage Products</h1>


        
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
                        <a href="editproduct.php?edit=<?php echo $row['product_name']; ?>"><Button class="form-btn">Edit</Button></a>
                    </td>
                    <td>
                        <a href="manageproduct.php?delete=<?php echo $row['product_name']; ?>"><Button class="form-btn delete">Delete</Button></a>
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