<?php


@include 'config.php';


if(isset($_POST['submit'])){
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
        <form action="" method="post">
            <h1>Home</h1>
            <div class="buttons">
                <button class="form-btn" name='submit'>Enter</button>
            </div>
        </form>
    </div>


</body>

</html>