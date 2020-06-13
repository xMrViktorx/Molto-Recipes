<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Molto Recipes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    require_once 'navbar.php';
    ?>


    <div id="fridge-push">
    </div>
    <div id="fridge">
        <div id="fridge-top">
            <hr id="fridge-handler">
        </div>

        <div id="fridge-middle">
            <form method="get" id="ingradient-preview-fridge" name="fridge-form">
                <input type="text" name="ingradient1" placeholder="Type ingradient here...">

                <hr id="fridge-self">
                <input type="text" name="ingradient2" placeholder="Type ingradient here...">

                <hr id="fridge-self">
                <input type="text" name="ingradient3" placeholder="Type ingradient here...">

                <hr id="fridge-self">
                <input type="text" name="ingradient4"  placeholder="Type ingradient here...">

                <hr id="fridge-self">
                <input type="text" name="ingradient5"  placeholder="Type ingradient here...">

                <hr id="fridge-self">
                <button class="add-button-fridge">Find my recipe!</button>
            </form>
        </div>
        <div id="bottom-fridge-1"></div>
        <div id="bottom-fridge-2"></div>
        
         <!-- RECIPES -->
    <div class="recipe-block">
        <?php
    require_once 'includes\dbh.inc.php';
    if(isset($_GET['ingradient1'])){
        $ingradient1=$_GET['ingradient1'];
        $ingradient2=$_GET['ingradient2'];
        $ingradient3=$_GET['ingradient3'];
        $ingradient4=$_GET['ingradient4'];
        $ingradient5=$_GET['ingradient5'];
    if($result = $conn->query("SELECT DISTINCT r.recipe_id, r.recipe_name, u.user_id, ing.ingradient, r.preparation_time,r.category, u.user_name, rr.recipe_rating_id, i.image, ROUND(AVG(rr.rating), 0) 
    FROM `ingradients` ing
    join `recipes` r on r.recipe_id = ing.recipe_id
    join `users` u on u.user_id=r.user_id 
    right join `images` i on i.recipe_id=r.recipe_id 
    left join `recipes_ratings` rr on rr.recipe_id = r.recipe_id
    WHERE ('".$ingradient1."' IS NULL OR ing.ingradient  = '".$ingradient1."') OR
    ('".$ingradient2."' IS NULL OR ing.ingradient  = '".$ingradient2."') OR
    ('".$ingradient3."' IS NULL OR ing.ingradient  = '".$ingradient3."') OR
    ('".$ingradient4."' IS NULL OR ing.ingradient  = '".$ingradient4."') OR
    ('".$ingradient5."' IS NULL OR ing.ingradient  = '".$ingradient5."')
    GROUP BY recipe_id")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                    if (isset($_SESSION['userId'])){
                        echo "<a href=\"recipe.php?recipeid=".$table[$i]['recipe_id']." \" class=\"recipe\">";
                    }else {
                        echo "<a href=\"recipe.php?recipeid=".$table[$i]['recipe_id']." \" class=\"recipe\">";
                    };
                    echo "<div class=\"outside\"> \n";
                    echo "<div class=\"recipe-img\"> \n";
                    echo "<img src=img/".$table[$i]['image']." alt=\"recipeImage\"> \n";
                    echo "</div> \n";
                    echo "<div class=\"rating\"> \n";
                    for ($j=5; $j>0; $j--)
                    {
                        if ($j>$table[$i]['ROUND(AVG(rr.rating), 0)'])
                            echo "<span><img src=\"img/spoonIcon.png\"></span> \n";
                        else
                            echo "<span><img src=\"img/goldenspoonIcon.png\"></span> \n";
                    }
                    echo "</div> \n";
                    echo "<span class=\"type-of-recipe\">".$table[$i]['category']."</span> \n";
                    echo "<p class=\"recipe-name\">".$table[$i]['recipe_name']."</p> \n";
                    echo "<ul> \n";
                    echo "<li><span class=\"icon\" style=\"background-image: url(img/personIcon.png);\"></span>by ".$table[$i]['user_name']."</li> \n";
                    echo "<img class=\"vertical-line\" src=\"img/verticalline.png\" alt=\"verticalline\"> \n";
                    echo "<li><span class=\"icon\" style=\"background-image: url(img/clockIcon.png);\"></span>".$table[$i]['preparation_time']." Mins</li> \n";
                    echo "</ul> \n";
                    echo "</div> \n";
                    echo "</a> \n";
                $i++;
        }       
        $result->free();
    }
    }
    
    ?>

    </div>

    </div>
    <br><br><br><br><br><br>


    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div>

    <!-- LOADER SCRIPT -->
    <script src="js/loader.js"></script>

    <!-- LOGIN DROPDOWN SCRIPT -->
    <script src="js/loginDropdown.js"></script>

</body>

</html>
