<?php
    session_start();
?>

<?php
    require_once 'includes\dbh.inc.php';
    if(!isset($_GET['recipeid'])){
        header("Location: index.php");
        exit();
    }else{
        $recipeid = $_GET['recipeid'];
        $sql = "SELECT recipe_name FROM recipes WHERE recipe_id=".$recipeid."";
        $result = $conn->query($sql);
        if($result->num_rows == 0) {
            header("Location: index.php");
            exit();
        }
    }
?>
<?php
if($result = $conn->query("SELECT r.recipe_name, r.preparation_time, r.dose, r.user_id, u.user_name, i.image FROM `recipes` r
join `users` u on u.user_id = r.user_id
join `images` i on i.recipe_id = r.recipe_id
WHERE r.recipe_id=".$recipeid."")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                        $recipeName = $table[$i]['recipe_name'];
                        $preparationTime = $table[$i]['preparation_time'];
                        $dose = $table[$i]['dose'];
                        $userName = $table[$i]['user_name'];
                        $image = $table[$i]['image'];
                $i++;
        }       
        $result->free();
    }
    
    ?>


<?php
 //COMMENT
    if(isset($_POST['submit'])){
        $comment = $_POST['comment'];
        $conn->query("INSERT INTO `comments` (`comment_id`, `user_id`, `recipe_id`, `comment`, `comment_time`) 
        VALUES (null, '".$_SESSION['userId']."', '".$recipeid."', '".$comment."', null)");
    }
?>



<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title><?php echo $recipeName ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recipe.css">
    <link rel="icon" type="image/x-icon" href="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <?php
    require 'navbar.php';
    ?>
    <div class="content">
        <div class="background-image" style="background-image: url(img/dark_layer.png), url(img/<?php echo $image; ?>)">
            <div class="information">
                <div class="left">
                    <p><?php echo $recipeName;
                        if(isset($_SESSION['userId'])){
                            $userid = $_SESSION['userId'];
                        }else {
                            $userid = 0;
                        }
                $sql = "SELECT * FROM favorites WHERE recipe_id='".$recipeid."' AND user_id='".$userid."'";
                $result = $conn->query($sql);
                if($result->num_rows == 1) {
                    echo " <img id=\"favorite-icon\" src=\"img/redHearth.png\" style=\"height: 45px; cursor: pointer\"> ";
                }else {
            echo " <img id=\"favorite-icon\" src=\"img/hearthIcon.png\" style=\"height: 45px; cursor: pointer\"> ";
                }?>
                        </p>
                    <?php 
    
    $yellowstars=0;
        
    if($result = $conn->query("SELECT ROUND(AVG(rating), 0) FROM `recipes_ratings` WHERE recipe_id='".$recipeid."'")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                    for ($j=0; $j<5; $j++)
                    {
                        if ($j<$table[$i]['ROUND(AVG(rating), 0)']){
                            echo "<img class=\"rating-icon\" src=\"img/goldenspoonIcon.png\" alt=\"spoon\" data-index=".$j.">";
                            $yellowstars++;
                        }
                        else
                            echo "<img class=\"rating-icon\" src=\"img/whiteSpoon.png\" alt=\"spoon\" data-index=".$j.">";
                    }
                $i++;
        }       
        $result->free();
    }
    ?>
                </div>
                <div class="right">
                    <p><img src="img/personIcon.png" alt="personIcon" style="height:28px;"> <?php echo $userName ?></p>
                    <p><img src="img/clockIcon.png" alt="clockIcon" style="height:28px;"> <?php echo $preparationTime ?> mins</p>
                </div>
            </div>
        </div>
        <div class="ingradient-section">
            <div class="header-div">
                <span class="header-span">INGRADIENTS</span>
            </div><br>
            <span onclick="minusDose()" class="dose-button" style="padding: 5px 17px;">-</span>
            <span id="dose-text">for <span id="dose-number"><?php echo $dose ?></span> person</span>
            <span onclick="plusDose()" class="dose-button">+</span><br><br>
            <ul>
                <?php
if($result = $conn->query("SELECT quantity, unit, ingradient FROM `ingradients` WHERE recipe_id=".$recipeid."")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                    echo "<li>- <span><span class=\"quantity\">".$table[$i]['quantity']."</span> ".$table[$i]['unit']."</span> ".$table[$i]['ingradient']."";
                $i++;
        }       
        $result->free();
    }
    
    ?>
            </ul>
        </div><br>
        <div class="step-section">
            <div class="header-div">
                <span class="header-span">STEPS</span>
            </div>
            <?php
if($result = $conn->query("SELECT step FROM `steps` WHERE recipe_id=".$recipeid." order by step_id")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                    echo "<p onclick=\"followStep(this.id)\" id='step".$i."' style=\"cursor: pointer\"><span>".($i+1).".</span> ".$table[$i]['step']."</span>";
                $i++;
        }       
        $result->free();
    }
    
    ?>
        </div>
        <hr>
        <div class="comment-section">
            <br>
            <p>COMMENTS</p><br>
            <form method="post" action="<?php echo "recipe.php?recipeid=".$recipeid.""?>">
                <span class="rounded-image"></span>
                <input type="text" name="comment" placeholder="Add comment...">
                <label for="send-comment" id="send-comment-button"></label>
                <input type="submit" name="submit" id="send-comment" value="Submit" style="display:none;">
            </form>
            <br>
            <div class="comment-field">
                <?php
                    if($result = $conn->query("SELECT c.comment, c.comment_time, u.user_name FROM comments c
join users u on u.user_id = c.user_id WHERE recipe_id=".$recipeid." order by c.comment_time DESC")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                echo "<table>";
                echo "<tr>";
                echo "<td rowspan=\"3\" style=\"width: 10%;\"><span class=\"rounded-image\"></span></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><span class=\"comment-name\">".$table[$i]['user_name']."</span><span class=\"comment-date\">".$table[$i]['comment_time']."</span></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><span class=\"comment-comment\">".$table[$i]['comment']."</span></td>";
                echo "</tr>";
                echo "</table><br>";
                echo "<hr><br>";
                $i++;
        }       
        $result->free();
    }
                    ?>
            </div>
        </div>

        <div id="timerContainer">
            <div class="timer" onclick="startTimer()">Start Timer!</div>
            <div class="startTimer reset" onclick="startTimer()">
                <i class="fas fa-play"></i>
            </div>
            <div class="pauseTimer reset" onclick="pauseTimer()">
                <i class="fas fa-pause"></i>
            </div>
            <div class="resetTimer reset" onclick="resetTimer()">Reset</div>
        </div>
        <script type="text/javascript" src="js/stopWatch.js"></script>
    </div>

    <script>
        //favorite-process
        var userid = <?php 
    if(isset($_SESSION['userId'])){
        echo $_SESSION['userId'];
    }else {
        echo 0;
    }
    ?>;
        var recipeid = <?php echo $_GET['recipeid'] ?>;
        window.addEventListener('load', function() {
            document.getElementById('favorite-icon').addEventListener('click', function(e) {
                e.preventDefault();
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "success") {
                            window.alert("Sucess");
                        } else if (this.responseText == "error") {
                            window.alert("error");
                        }
                    }
                };
                xhttp.open("POST", "favorite_process", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("userId=" + userid + "&recipeId=" + recipeid);
            });
        });

    </script>


    <script>
        var dose = <?php echo $dose ?>;
        var userid = <?php 
    if(isset($_SESSION['userId'])){
        echo $_SESSION['userId'];
    }else {
        echo 0;
    }
    ?>;
        var recipeid = <?php echo $_GET['recipeid'] ?>;
        var currentstars = <?php echo $yellowstars ?>;
        var currentstars2 = currentstars;

    </script>
    <script src="js/recipe.js"></script>

    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div>

    <!-- LOADER SCRIPT -->
    <script src="js/loader.js"></script>

    <!-- LOGIN DROPDOWN SCRIPT -->
    <script src="js/loginDropdown.js"></script>
</body>

</html>
