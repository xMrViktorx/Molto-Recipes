<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'includes\dbh.inc.php';
    $rate = $_POST['ratedIndex']+1;
    $userid = $_POST['userid'];
    $recipeid = $_POST['recipeid'];
    
    if (isset($_POST['save'])) {
        $conn->query("DELETE FROM `recipes_ratings` WHERE user_id='".$userid."' AND recipe_id='".$recipeid."' AND EXISTS (SELECT * FROM `recipes_ratings` WHERE user_id='".$userid."' AND recipe_id='".$recipeid."')");
        $conn->query("INSERT INTO `recipes_ratings` (`recipe_rating_id`, `recipe_id`, `user_id`, `rating`) VALUES (null, '".$recipeid."', '".$userid."', '".$rate."')");
    }

    echo json_encode($rate);
}
?>
