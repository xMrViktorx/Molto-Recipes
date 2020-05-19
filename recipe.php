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

    <style>
        div i {
            color: green;
        }

    </style>
</head>

<body>
    <?php
    require 'navbar.php';
    ?>
    <div class="content">
        <div class="background-image" style="background-image: url(img/dark_layer.png), url(img/<?php echo $image; ?>)">
            <div class="information">
                <div class="left">
                    <p><?php echo $recipeName ?> <img src="img/hearthIcon.png" style="height: 45px;"></p>
                    <?php 
    
    $recipeid=$_GET['recipeid'];
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
            <span onclick="return minusDose()" class="dose-button" style="padding: 5px 17px;">-</span>
            <span id="dose-text">for <span id="dose-number"><?php echo $dose ?></span> person</span>
            <span onclick="return plusDose()" class="dose-button">+</span><br><br>
            <ul>
                <?php
if($result = $conn->query("SELECT quantity, unit, ingradient FROM `ingradients` WHERE recipe_id=".$recipeid."")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                    echo "<li>- <span>".$table[$i]['quantity']." ".$table[$i]['unit']."</span> ".$table[$i]['ingradient']."";
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
                    echo "<p><span>".($i+1).".</span> ".$table[$i]['step']."</span>";
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
            <form method="post" action="recipe.php">
                <span class="rounded-image"></span>
                <input type="text" name="comment" placeholder="Add comment...">
                <label for="send-comment" id="send-comment-button"></label>
                <input type="submit" name="submit" id="send-comment" value="Submit" style="display:none;">
            </form>
            <br>
            <div class="comment-field">
                <?php
                    if($result = $conn->query("SELECT c.comment, c.comment_time, u.user_name FROM comments c
join users u on u.user_id = c.user_id order by c.comment_time WHERE recipe_id=".$recipeid."")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
                foreach($table as $row){
                echo "<table>";
                echo "<tr>";
                echo "<td rowspan=\"3\" style=\"width: 10%;\"><span class=\"rounded-image\"></span></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><span class=\"comment-name\">".$table[$i]['user_name']."</span><span class=\"comment-date\">2020.05.14</span></td>";
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
    </div>


    <script>
        var ratedIndex = -1;
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


        $(document).ready(function() {

            $('.rating-icon').on('click', function() {
                var ratedIndex = parseInt($(this).data('index'));
                resetStarColors();
                setStarsOnClick(ratedIndex);
                saveToTheDB(ratedIndex);
            });
        });

        $('.rating-icon').mouseover(function() {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));
            setStarsOver(currentIndex);
        });

        $('.rating-icon').mouseleave(function() {
            resetStarColors();
            setStarsLeave(currentstars);
        });

        function saveToTheDB(ratedIndex) {
            $.ajax({
                url: 'fetch.php',
                method: 'POST',
                cache: 'false',
                dataType: 'json',
                data: {
                    save: 1,
                    userid: userid,
                    recipeid: recipeid,
                    ratedIndex: ratedIndex
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function setStarsOver(currentstars) {
            for (var i = 0; i <= currentstars; i++) $('.rating-icon:eq(' + i + ')').attr("src", "img/easySpoon.png");
        }

        function setStarsLeave(currentstars) {
            for (var i = 0; i < currentstars2; i++) $('.rating-icon:eq(' + i + ')').attr("src", "img/goldenspoonIcon.png");
        }

        function resetStarColors() {
            $(".rating-icon").attr("src", "img/whiteSpoon.png");
        }

        function setStarsOnClick(ratedIndex) {
            for (var i = 0; i < (currentstars + ratedIndex + 1) / 2; i++) {
                $('.rating-icon:eq(' + i + ')').attr("src", "img/goldenspoonIcon.png");
            }
            currentstars2 = (currentstars + ratedIndex + 1) / 2;
        }

    </script>

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
            document.getElementById("login-my-dropdown").classList.toggle("show");
        }

    </script>

</body>

</html>
