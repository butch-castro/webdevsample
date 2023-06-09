<?php

@include "config.php";

session_start();

if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
if(isset($_POST['logout'])){
    $_SESSION = array();
    session_destroy();
    header("location:adminlogin.php");
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
    <div class="container short-form">
        <h1>Admin Page</h1>
        
        <div class="menu">
            <div class="buttons">
                <a href="addproduct.php"><button class="form-btn">Add Product</button></a> 
            </div>
            <div class="buttons">
                <a href="manageproduct.php"><button class="form-btn">Manage Products</button></a>
            </div>
            <div class="buttons">
                <a href="createuser.php"><button class="form-btn">Create User</button></a>
            </div>
            <div class="buttons">
                <a href="manageuser.php"><button class="form-btn">Manage Users</button></a>
            </div>
            
        </div>
        
        <form method="post" action="">
            <div class="container-logout">
                <button class="form-btn" name="logout">Log Out</button>
            </div>
        </form>
        
        
    </div>


</body>

</html>