<?php

if(isset($_POST['recipeId'])) {
    require_once 'includes/dbh.inc.php';
        
    $recipeId = $_POST['recipeId'];
    $userId = $_POST['userId'];
    
    
    $sql = "SELECT * FROM `favorites` WHERE recipe_id='".$recipeId."' AND user_id='".$userId."'";
    $result = $conn->query($sql);
     if($result->num_rows != 0){
         $conn->query("DELETE FROM `favorites` WHERE recipe_id='".$recipeId."' AND user_id='".$userId."'");
    exit("delete");
     }
    else{
    $conn->query("INSERT INTO `favorites` (`favorite_id`, `recipe_id`, `user_id`)
            VALUES (null, '".$recipeId."', '".$userId."')");
        exit("insert");
    }
}else {
    exit("error");
}

?>
