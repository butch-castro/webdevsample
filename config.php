<?php

$conn = mysqli_connect('localhost','user1','userpw123','webdevsample_db',3307);
if(mysqli_connect_error())
        echo "Connection Error.";
    else
        echo "Database Connection Successfully.";
?>