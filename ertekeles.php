<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Example Title</title>
	<meta name="author" content="Your Name">
	<meta name="description" content="Example description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="icon" type="image/x-icon" href=""/>
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
    
    
</body>

</html>