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

    <!-- TITLE PAGE -->
    <div class="title-page">
        <div class="keyword">
            <br><br><br><br>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="soup">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="vegan">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="cake">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="meat">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="snack">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="drink">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="salad">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="appetizer">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="pasta">
            </form>
            <form method="post" action="keyword-page.php">
                <input type="submit" name="category" value="bread & crescent">
            </form>
        </div>
        <form method="get" action="search-page.php">
            <input type="text" id="search-input" placeholder="Search recipe..." name="keyword">
        </form>
    </div>
    <!-- RECIPES -->
    <div id="search-text"><span>The category is:</span><span id="search-value"></span></div>
    <div class="recipe-block">
        <?php 
        include("list3.php");
        ?>
    </div>




    <div class="loader-wrapper">
        <span class="loader"><img src="img/goldenspoonIcon.png" class="loader-inner"></span>
    </div>

    <!-- LOADER SCRIPT -->
    <script src="js/loader.js"></script>

    <!-- LOGIN DROPDOWN SCRIPT -->
    <script src="js/loginDropdown.js"></script>

</body>

</html>
