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
        <h1>Admin Page</h1>
        
        <div class="container-product">
            <div class="buttons">
                <a href="addproduct.php"><button class="form-btn">Add  Product</button></a>
                <button class="form-btn">Edit Product</button>
                <a href="removeproduct.php"><button class="form-btn">Remove Product</button></a>
            </div>
        </div>

        <div class="container-user">
            <a href="manageuser.php"><button class="form-btn">Manage Users</button></a>
            <a href="createuser.php"><button class="form-btn">Create User</button></a>
        </div>

        <div class="container-logout">
            <a href="login.php"><button class="form-btn">Log Out</button></a>
        </div>
        
    </div>


</body>

</html>