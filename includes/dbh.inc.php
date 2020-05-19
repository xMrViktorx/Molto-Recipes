<?php
    $conn = new mysqli('localhost','root','','molto_recipes');
    if($conn->connect_errno){
        echo $conn->connect_error;
        die();
    }

    mysqli_query($conn, "SET NAMES utf8") or die (mysqli_error($conn));
    mysqli_query($conn, "SET CHARACTER SET utf8") or die (mysqli_error($conn));
    mysqli_query($conn, "SET COLLATION_CONNECTION='utf8_general_ci'") or die (mysqli_error($conn));
?>
