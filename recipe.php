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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <style>
        div i{
            color: green;
        }
    </style>
</head>
 
<body>
           <?php
    require_once 'includes\dbh.inc.php';
    
    $recipeid=$_GET['recipeid'];
    $yellowstars=0;
        
    if($result = $conn->query("SELECT ROUND(AVG(rating), 0) FROM `recipes_ratings` WHERE recipe_id='".$recipeid."'")){
        $table = $result->fetch_all(MYSQLI_ASSOC);
         $i=0;
        echo "<div style=\"background: #000; padding: 50px;\"> \n";
                foreach($table as $row){
                    for ($j=0; $j<5; $j++)
                    {
                        if ($j<$table[$i]['ROUND(AVG(rating), 0)']){
                            echo "<i class=\"fa fa-star fa-2x\" style=\"color:yellow;\" data-index=".$j."></i> \n";
                            $yellowstars++;
                        }
                        else
                            echo "<i class=\"fa fa-star fa-2x\" style=\"color:white;\" data-index=".$j."></i> \n";
                    }
                $i++;
        echo "</div>";
        }       
        $result->free();
    }
    
    ?>

 
 
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
        

        $(document).ready(function() {
            
            $('.fa-star').on('click', function() {
                var ratedIndex = parseInt($(this).data('index'));
                saveToTheDB(ratedIndex);
            });
        });
 
        $('.fa-star').mouseover(function() {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStarsOver(currentIndex);
            });

            $('.fa-star').mouseleave(function() {
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
            for (var i = 0; i <= currentstars; i++)
                $('.fa-star:eq(' + i + ')').css('color', 'green');
        }
        function setStarsLeave(currentstars) {
            for (var i = 0; i < currentstars; i++)
                $('.fa-star:eq(' + i + ')').css('color', 'green');
        }

        function resetStarColors() {
            $('.fa-star').css('color', 'white');
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
