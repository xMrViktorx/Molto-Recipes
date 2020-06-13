<?php
    require_once 'includes\dbh.inc.php';
    $keyword='';
    if(isset($_POST['category'])){
     $keyword=$_POST['category'];
    }
    
    if($result = $conn->query("SELECT r.recipe_id, r.recipe_name, u.user_id, r.preparation_time,r.category, u.user_name, rr.recipe_rating_id, i.image, ROUND(AVG(rr.rating), 0) 
    FROM `recipes` r
    join `users` u on u.user_id=r.user_id 
    right join `images` i on i.recipe_id=r.recipe_id 
    left join `recipes_ratings` rr on rr.recipe_id = r.recipe_id 
    WHERE r.category='$keyword'
    group by recipe_id")){
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
    
    ?>
<script>document.getElementById("search-value").innerHTML = "<?php echo $keyword; ?>";
    
</script>
