<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Example Title</title>
    <meta name="author" content="Your Name">
    <meta name="description" content="Example description">
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

    <!-- TITLE PAGE -->
    <div class="titlePage">
        <div class="keywords">
            <br><br><br><br>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
            <a href="#">cookies</a>
        </div>
        <input type="text" id="searchInput" placeholder="Search recipe..." name="keyword">
    </div>
    <!-- RECIPES -->
    <div class="recipes">
        <?php
    require_once 'includes\dbh.inc.php';
        
    if($result = $conn->query("SELECT r.recipe_id, r.recipe_name, u.user_id, r.preparation_time, r.image, u.user_name, rr.recipe_rating_id, ROUND(AVG(rr.rating), 0) FROM `recipes` r 
    join `users` u on u.user_id=r.user_id
    left join `recipes_ratings` rr on rr.recipe_id = r.recipe_id
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
                    echo "<span class=\"typeofrecipe\">SNACKS</span> \n";
                    echo "<p class=\"recipeName\">".$table[$i]['recipe_name']."</p> \n";
                    echo "<ul> \n";
                    echo "<li><span class=\"icon\" style=\"background-image: url(img/personIcon.png);\"></span>by ".$table[$i]['user_name']."</li> \n";
                    echo "<img class=\"verticalline\" src=\"img/verticalline.png\" alt=\"verticalline\"> \n";
                    echo "<li><span class=\"icon\" style=\"background-image: url(img/clockIcon.png);\"></span>".$table[$i]['preparation_time']." Mins</li> \n";
                    echo "</ul> \n";
                    echo "</div> \n";
                    echo "</a> \n";
                $i++;
        }       
        $result->free();
    }
    
    ?>

    </div>




    <!-- LOADER 
    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div> -->

    <!-- LOADER SCRIPT -->
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });

    </script>



    <!-- LOGIN DROPDOWN SCRIPT -->
    <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function loginFunction() {
            document.getElementById("loginmyDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.loginDropbtn')) {
                var dropdowns = document.getElementsByClassName("loginDropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                }
            }
        }

    </script>

</body>

</html>
